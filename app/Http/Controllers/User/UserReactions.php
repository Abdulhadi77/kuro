<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\DataTables\UserReactionsDataTable;
use Carbon\Carbon;
use App\Models\Reaction;

use App\Http\Controllers\Validations\ReactionsRequest;


class UserReactions extends Controller
{

	public function __construct() {

	}

	
    public function index(UserReactionsDataTable $reactions){
        return $reactions->render('user.reactions.index',['title'=>trans('user.reactions')]);
    }


    public function show($id){
        $reactions =  Reaction::find($id);
        return is_null($reactions) || empty($reactions)?
        backWithError(trans("user.undefinedRecord"),url("reactions")) :
        view('user.reactions.show',[
		'title'=>trans('user.show'),
		'reactions'=>$reactions
        ]);
    } 
}