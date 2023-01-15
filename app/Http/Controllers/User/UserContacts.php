<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\DataTables\UserContactsDataTable;
use Carbon\Carbon;
use App\Models\Contact;
use App\Models\VotePlan;
use App\Models\BFOTPlan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Validations\UserContactsRequest;

class UserContacts extends Controller
{

	  public function __construct() {

	  }


    public function index(UserContactsDataTable $contacts){
        return $contacts->render('user.contacts.index',['title'=>trans('user.requests')]);
      }


    public function create(){
        return view('user.contacts.create',['title'=>trans('user.create')]);
      }

    public function store(UserContactsRequest $request){
      $data = $request->except("_token", "_method");
      if ($data['subject'] == "vote_revenue")
        if (auth()->user()->vote_plan_id != 0)
          if(Auth::user()->vote_revenue(VotePlan::find(auth()->user()->vote_plan_id)) > 0){
              $user=auth()->user();
              $user->kuro_address=$data['kuro_address'];
              $user->save();
            $data['user_id'] = auth()->user()->id;
            $data['name'] = auth()->user()->name;
            $data['email'] = auth()->user()->email;
            $data['status'] = 'pending';
            $contacts = Contact::create($data);
            $redirect = isset($request["add_back"])?"/create":"";
            return redirectWithSuccess(url('user/contacts'.$redirect), trans('user.added'));
          }
          else{
            $redirect = isset($request["add_back"])?"/create":"";
            return redirectWithError(url('user/contacts'.$redirect), trans('user.no_vote_revenue'));
          }
        else{
          $redirect = isset($request["add_back"])?"/create":"";
          return redirectWithError(url('user/contacts'.$redirect), trans('user.no_vote_revenue'));
        }


      if ($data['subject'] == 'bfot_revenue')
        if (auth()->user()->b_f_o_t_plan_id != 0)
          if(Auth::user()->bfot_revenue(BFOTPlan::find(auth()->user()->b_f_o_t_plan_id)) != 0){
              $user=auth()->user();
              $user->kuro_address=$data['kuro_address'];
              $user->save();
            $data['user_id'] = auth()->user()->id;
            $data['name'] = auth()->user()->name;
            $data['email'] = auth()->user()->email;
            $data['status'] = 'pending';
            $contacts = Contact::create($data);
            $redirect = isset($request["add_back"])?"/create":"";
            return redirectWithSuccess(url('user/contacts'.$redirect), trans('user.added'));
          }
          else{
            $redirect = isset($request["add_back"])?"/create":"";
            return redirectWithError(url('user/contacts'.$redirect), trans('user.no_bfot_revenue'));
          }
        else{
          $redirect = isset($request["add_back"])?"/create":"";
          return redirectWithError(url('user/contacts'.$redirect), trans('user.no_bfot_revenue'));
        }
          //dd($data['subject']);
      /*$data['user_id'] = auth()->user()->id;
      $data['name'] = auth()->user()->name;
      $data['email'] = auth()->user()->email;
      $data['status'] = 'pending';
      $contacts = Contact::create($data);
      $redirect = isset($request["add_back"])?"/create":"";
      return redirectWithSuccess(url('user/contacts'.$redirect), trans('user.added'));*/
    }

    public function show($id){
      $contacts =  Contact::find($id);
      return is_null($contacts) || empty($contacts)?
        		backWithError(trans("user.undefinedRecord"),aurl("contacts")) :
        		view('user.contacts.show',[
				    'title'=>trans('user.show'),
					'contacts'=>$contacts
        		]);
      }
}
