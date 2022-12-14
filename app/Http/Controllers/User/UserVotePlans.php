<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\DataTables\UserVotePlansDataTable;
use App\Http\Requests\VotePlanRequest;
use Carbon\Carbon;
use App\Models\VotePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Validations\VotePlansRequest;
use App\Models\BFOTPlan;
use App\Models\User;
use GuzzleHttp\Middleware;

class UserVotePlans extends Controller
{
/*
->addColumn('num_comments', function ($vote_plan_for_this_user) {
			return $vote_plan_for_this_user->users()->find(auth()->user()->id)->comments()->count();
		})
		->addColumn('num_likes', function ($vote_plan_for_this_user) {
			return $vote_plan_for_this_user->users()->find(auth()->user()->id)->likes();
		})
		->addColumn('num_dislikes', function ($vote_plan_for_this_user) {
			return $vote_plan_for_this_user->users()->find(auth()->user()->id)->dislikes();
		})
		->addColumn('vote_revenue', function ($vote_plan_for_this_user) {
			return $vote_plan_for_this_user->users()->find(auth()->user()->id)->vote_revenue($vote_plan_for_this_user);
		})
		->addColumn('kuro_balance', function ($vote_plan_for_this_user) {
			return $vote_plan_for_this_user->users()->find(auth()->user()->id)->kuro_balance;
		})






*/
	public function __construct() {
		


	}




            public function index(UserVotePlansDataTable $voteplans)
            {
				//dd(VotePlan::query()->select("vote_plans.*")->where('id', auth()->user()->vote_plan_id));
				//dd(auth()->user()->vote_plan_id);
				/*$voteplans = VotePlan::all();
				dd(auth()->user()->vote()->get());
				foreach($voteplans as $voteplan){
					if ($voteplan->users->where('vote_plan_id', $voteplan->id)){
						dd($voteplan->users->where('vote_plan_id', $voteplan->id));
						dd($voteplan);
					}
				}*/
					  //return VotePlan::query()->select("vote_plans.*")->where('id', $voteplan->id);
               return $voteplans->render('user.voteplans.index',['title'=>trans('user.voteplans')]);
            }



            public function show($id)
            {
              $voteplans =  VotePlan::find($id);
              return is_null($voteplans) || empty($voteplans)?
              backWithError(trans("admin.undefinedRecord"),url("voteplans")) :
              view('user.voteplans.show',[
              'title'=>trans('user.show'),
            'voteplans'=>$voteplans
              ]);
            }

    public function joinVotePlan(Request $requestm,$id)
    {
        $user=auth()->user();
        $user->vote_plan_id=$id;
        $user->save();
        return redirect()->back();

    }




}
