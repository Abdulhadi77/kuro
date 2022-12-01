<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\DataTables\UserCommentsDataTable;
use Carbon\Carbon;
use App\Models\Comment;


class UserComments extends Controller
{

	public function __construct() {

	}

	
    public function index(UserCommentsDataTable $comments){
        return $comments->render('user.comments.index',['title'=>trans('user.comments')]);
    }


    public function show($id){
        $comments =  Comment::find($id);
        return is_null($comments) || empty($comments)?
        backWithError(trans("user.undefinedRecord"),url("comments")) :
        view('user.comments.show',[
		'title'=>trans('user.show'),
		'comments'=>$comments
        ]);
    } 
}