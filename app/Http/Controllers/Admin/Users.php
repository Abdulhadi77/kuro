<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use Carbon\Carbon;
use App\Models\User;

use App\Http\Controllers\Validations\UsersRequest;
use App\Models\VotePlan;
use App\Models\BFOTPlan;



class Users extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:users_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:users_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:users_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:users_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}





            public function index(UsersDataTable $users)
            {
              /*$users = User::all();
              foreach($users as $user){
                //dd(VotePlan::find());
                dd($user->vote->type);
                //dd($user_vote);
                //dd($blog_comments);
              }*/
              //$user->vote();
                //dd(VotePlan::query()->findOrFail(1));
				//check if conditions are true
				//$user = User::find(auth()->user()->id);
				//$vote_plan = VotePlan::find(1);

                return $users->render('admin.users.index',['title'=>trans('admin.users')]);
            //}
		}




            public function create()
            {

               return view('admin.users.create',['title'=>trans('admin.create')]);
            }



            public function store(UsersRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$users = User::create($data);
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('users'.$redirect), trans('admin.added')); }

    function uploadImage($image , $fileName)
    {
        $imageName =  time().'.'. $image->extension();
        $imageToSave = $fileName . DIRECTORY_SEPARATOR . time().'.'. $image->extension();

        $image->move(public_path('storage'. DIRECTORY_SEPARATOR .$fileName), $imageName);
        return $imageToSave;
    }

            public function show($id)
            {
				;
        		
        		$users =  User::find($id);
				$vote_revenue = 0;
				$bfot_revenue = 0;
				if ($users){
					if ($users->vote_plan_id != 0)
						$vote_revenue = $users->vote_revenue(VotePlan::find($users->vote_plan_id));
					if ($users->b_f_o_t_plan_id != 0)
						$bfot_revenue = $users->bfot_revenue(BFOTPlan::find($users->b_f_o_t_plan_id));
				}
				return is_null($users) || empty($users)?
        		backWithError(trans("admin.undefinedRecord"),aurl("users")) :
        		view('admin.users.show',[
				    'title'=>trans('admin.show'),
					'users'=>$users,
					'vote_revenue'=>$vote_revenue,
					'bfot_revenue'=>$bfot_revenue,
        		]);
            }




            public function edit($id)
            {
        		$users =  User::find($id);
        		return is_null($users) || empty($users)?
        		backWithError(trans("admin.undefinedRecord"),aurl("users")) :
        		view('admin.users.edit',[
				  'title'=>trans('admin.edit'),
				  'users'=>$users
        		]);
            }




            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new UsersRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(UsersRequest $request,$id)
            {
              // Check Record Exists
              $users =  User::find($id);
              if(is_null($users) || empty($users)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("users"));
              }
              $data = $this->updateFillableColumns();
              User::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('users'.$redirect), trans('admin.updated'));
            }



	public function destroy($id){
		$users = User::find($id);
		if(is_null($users) || empty($users)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("users"));
		}

		it()->delete('user',$id);
		$users->delete();
		return redirectWithSuccess(aurl("users"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$users = User::find($id);
				if(is_null($users) || empty($users)){
					return backWithError(trans('admin.undefinedRecord'),aurl("users"));
				}

				it()->delete('user',$id);
				$users->delete();
			}
			return redirectWithSuccess(aurl("users"),trans('admin.deleted'));
		}else {
			$users = User::find($data);
			if(is_null($users) || empty($users)){
				return backWithError(trans('admin.undefinedRecord'),aurl("users"));
			}

			it()->delete('user',$data);
			$users->delete();
			return redirectWithSuccess(aurl("users"),trans('admin.deleted'));
		}
	}


}
