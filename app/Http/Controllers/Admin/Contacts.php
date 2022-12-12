<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ContactsDataTable;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\User;
use App\Models\VotePlan;

use App\Http\Controllers\Validations\ContactsRequest;
use App\Models\BFOTPlan;

class Contacts extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:contacts_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:contacts_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:contacts_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:contacts_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            public function index(ContactsDataTable $contacts)
            {
              $contact = Contact::find(1);
              //dd($contact->user->vote_revenue());
              //dd($contact->user->vote_revenue(VotePlan::find($contact->user->vote_plan_id)));
               return $contacts->render('admin.contacts.index',['title'=>trans('admin.requests')]);
            }


            public function show($id)
            {
        		$contacts =  Contact::find($id);
        		return is_null($contacts) || empty($contacts)?
        		backWithError(trans("admin.undefinedRecord"),aurl("contacts")) :
        		view('admin.contacts.show',[
				    'title'=>trans('admin.show'),
					'contacts'=>$contacts
        		]);
            }


            public function edit($id)
            {
                $contacts =  Contact::find($id);
                return is_null($contacts) || empty($contacts)?
                backWithError(trans("admin.undefinedRecord"),aurl("contacts")) :
                view('admin.contacts.edit',[
                'title'=>trans('admin.edit'),
                'contacts'=>$contacts
                ]);
            }


            public function updateFillableColumns() {
                $fillableCols = [];
                foreach (array_keys((new ContactsRequest)->attributes()) as $fillableUpdate) {
                  if (!is_null(request($fillableUpdate))) {
                    $fillableCols[$fillableUpdate] = request($fillableUpdate);
                  }
                }
                return $fillableCols;
			      }

            public function update(ContactsRequest $request,$id)
            {
              // Check Record Exists
              $contacts =  Contact::find($id);
              if(is_null($contacts) || empty($contacts)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("contacts"));
              }
              
              
              
              $data = $this->updateFillableColumns(); 
              $user = User::find($contacts->user_id);
              
              //dd($user->vote_revenue(VotePlan::findOrfail($user->vote_plan_id)));
              
              //Update user fields (paid)
              if ($data['status'] == 'done'){
                if ($data['subject'] == 'vote_revenue'){
                  $user_vote_plan = VotePlan::findOrfail($user->vote_plan_id);

                  $paid_balance = $user->paid_vote_plan_balance + $user->paid_bfot_plan_balance;
                  $unpaid_votes = ($user->votes() - $user->num_paid_votes);
		              $unpaid_balance = ($user->kuro_balance - $paid_balance);


                  if ($user_vote_plan->num_votes_cond == 0)
                    $num_prizes_based_on_votes = 1000000;
                    elseif ($unpaid_votes == $user_vote_plan->num_votes_cond)
                      $num_prizes_based_on_votes = 1;
                      elseif ($user_vote_plan->num_votes_cond == 1)
                        $num_prizes_based_on_votes = $unpaid_votes - $user_vote_plan->num_votes_cond;
                        else
                          $num_prizes_based_on_votes = intdiv($unpaid_votes , $user_vote_plan->num_votes_cond);

                  if ($user_vote_plan->kuro_balance_cond == 0)
                    $num_prizes_based_on_kuro_balance = 1000000;
                    elseif ($unpaid_balance == $user_vote_plan->kuro_balance_cond)
                      $num_prizes_based_on_kuro_balance = 1;
                      elseif ($user_vote_plan->kuro_balance_cond == 1)
                        $num_prizes_based_on_kuro_balance = $unpaid_balance - $user_vote_plan->kuro_balance_cond;
                        else
                          $num_prizes_based_on_kuro_balance = intdiv($unpaid_balance , $user_vote_plan->kuro_balance_cond);

                      //He has a num_prizes
                  if ($user_vote_plan->num_votes_cond == 0 && $user_vote_plan->kuro_balance_cond == 0)
                    $num_of_prizes = 0;
                  else
                    $num_of_prizes = min($num_prizes_based_on_votes, $num_prizes_based_on_kuro_balance);
                      
                      //dd($user->vote_revenue($user_vote_plan));
                  if ($num_of_prizes > 0){
                    $new_paid_vote_plan_balance = $user->paid_vote_plan_balance + ($user_vote_plan->kuro_balance_cond * $num_of_prizes);
                    $user->paid_vote_plan_balance =  $new_paid_vote_plan_balance;

                    $new_num_paid_votes = $user->num_paid_votes + ($user_vote_plan->num_votes_cond * $num_of_prizes);
                    $user->num_paid_votes = $new_num_paid_votes;
                    $user->save();
                  }
                  //dd($user);
                }

                
                elseif ($data['subject'] == 'bfot_revenue'){
                  $user_bfot_plan = BFOTPlan::findOrfail($user->b_f_o_t_plan_id);

                  $paid_balance = $user->paid_vote_plan_balance + $user->paid_bfot_plan_balance;
                  $unpaid_refs = ($user->referrals()->count() - $user->num_paid_refs);
		              $unpaid_balance = ($user->kuro_balance - $paid_balance);


                  if ($user_bfot_plan->num_of_refs_cond == 0)
                    $num_prizes_based_on_refs = 1000000;
                    elseif ($unpaid_refs == $user_bfot_plan->num_of_refs_cond)
                      $num_prizes_based_on_refs = 1;
                      elseif ($user_bfot_plan->num_of_refs_cond == 1)
                        $num_prizes_based_on_refs = $unpaid_refs - $user_bfot_plan->num_of_refs_cond;
                        else
                          $num_prizes_based_on_refs = intdiv($unpaid_refs , $user_bfot_plan->num_of_refs_cond);

                  if ($user_bfot_plan->kuro_balance_cond == 0)
                    $num_prizes_based_on_kuro_balance = 1000000;
                    elseif ($unpaid_balance == $user_bfot_plan->kuro_balance_cond)
                      $num_prizes_based_on_kuro_balance = 1;
                      elseif ($user_bfot_plan->kuro_balance_cond == 1)
                        $num_prizes_based_on_kuro_balance = $unpaid_balance - $user_bfot_plan->kuro_balance_cond;
                        else
                          $num_prizes_based_on_kuro_balance = intdiv($unpaid_balance , $user_bfot_plan->kuro_balance_cond);

                      //He has a num_prizes
                  if ($user_bfot_plan->num_of_refs_cond == 0 && $user_bfot_plan->kuro_balance_cond == 0)
                    $num_of_prizes = 0;
                  else
                    $num_of_prizes = min($num_prizes_based_on_refs, $num_prizes_based_on_kuro_balance);
                      
                      //dd($user->vote_revenue($user_bfot_plan));
                  if ($num_of_prizes > 0){
                    $new_paid_bfot_plan_balance = $user->paid_bfot_plan_balance + ($user_bfot_plan->kuro_balance_cond * $num_of_prizes);
                    $user->paid_bfot_plan_balance =  $new_paid_bfot_plan_balance;

                    $new_num_paid_refs = $user->num_paid_refs + ($user_bfot_plan->num_of_refs_cond * $num_of_prizes);
                    $user->num_paid_refs = $new_num_paid_refs;
                    $user->save();
                  }
                }
              }

              //dd($contacts['status']);
              Contact::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('contacts'.$redirect), trans('admin.updated'));
            }

          public function destroy($id){
              $contacts = Contact::find($id);
              if(is_null($contacts) || empty($contacts)){
                return backWithSuccess(trans('admin.undefinedRecord'),aurl("contacts"));
              }
                        
              it()->delete('contact',$id);
              $contacts->delete();
              return redirectWithSuccess(aurl("contacts"),trans('admin.deleted'));
          }


        public function multi_delete(){
          $data = request('selected_data');
          if(is_array($data)){
            foreach($data as $id){
              $contacts = Contact::find($id);
              if(is_null($contacts) || empty($contacts)){
                return backWithError(trans('admin.undefinedRecord'),aurl("contacts"));
              }
                            
              it()->delete('contact',$id);
              $contacts->delete();
            }
            return redirectWithSuccess(aurl("contacts"),trans('admin.deleted'));
          }else {
            $contacts = Contact::find($data);
            if(is_null($contacts) || empty($contacts)){
              return backWithError(trans('admin.undefinedRecord'),aurl("contacts"));
            }
                          
            it()->delete('contact',$data);
            $contacts->delete();
            return redirectWithSuccess(aurl("contacts"),trans('admin.deleted'));
          }
        }
            

}