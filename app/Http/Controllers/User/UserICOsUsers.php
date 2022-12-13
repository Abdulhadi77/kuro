<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\DataTables\UserIcoUsersDataTable;
use App\Http\Requests\VotePlanRequest;
use App\Models\IcoUser;
use Carbon\Carbon;
use App\Models\ICO;

use App\Http\Controllers\Validations\ICOsRequest;


class UserICOsUsers extends Controller
{

	public function __construct() {
    $this->middleware('UserRole:icousers_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('UserRole:icousers_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('UserRole:icousers_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('UserRole:icousers_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

            public function index(UserIcoUsersDataTable $icos)
            {
              return $icos->render('user.icousers.index',['title'=>trans('user.icos')]);
              /*$icos = ICO::all();
                dd($icos);
                return view('')->with(array('icos'=>$icos));*/
            }

            public function show($id)
            {
                $icos =  ICO::find($id);
                return is_null($icos) || empty($icos)?
                backWithError(trans("user.undefinedRecord"),aurl("icos")) :
                view('user.icos.show',[
                'title'=>trans('user.show'),
                'icos'=>$icos
                ]);
            }


            public function joinICO(VotePlanRequest $request)
            {
                //dd($request->id);
                $user=auth()->user();
                $ico_user=new IcoUser();
                $ico_user->user_id =$user->id;
                $ico_user->i_c_o_id  =$request->id;
                $ico_user->amount =$request->amount;
                $ico_user->purchase_method =$request->purchase_method;
                $ico_user->status = 'pending';
                /*if($request->status == 'opened')
                    $ico_user->status = 'joined';
                elseif ($request->status == 'will_open')
                    $ico_user->status = 'pending';*/
                $ico_user->save();
                return redirect('user/icousers');

            }
}
