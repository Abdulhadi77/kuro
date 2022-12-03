<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\Reactions;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\VerificationServices;
use App\Mail\NewMail;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Reaction;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{


    public function createLike(Request $request,$id)
    {
        try {
            $blog=Blog::find($id);
            $userBlog=Reaction::where('blog_id',$blog->id)->where('user_id',auth()->user()->id)->first();
            if($userBlog)
            {
                $userBlog->like = 1;
                $userBlog->dislike = 0;
                $userBlog->save();
            }else
            {
                $userBlog=new Reaction();
                $userBlog->user_id=auth()->user()->id;
                $userBlog->blog_id=$blog->id;
                $userBlog->like=1;
                $userBlog->dislike=0;
                $userBlog->save();
            }
            return redirect()->back();
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error',$ex->getMessage()]);

        }

    }

    public function createDisLike(Request $request,$id)
    {
        try {
            $blog=Blog::find($id);
            $userBlog=Reaction::where('blog_id',$blog->id)->where('user_id',auth()->user()->id)->first();
            if($userBlog)
            {
                $userBlog->like = 0;
                $userBlog->dislike = 1;
                $userBlog->save();
            }else
            {
                $userBlog=new Reaction();
                $userBlog->user_id=auth()->user()->id;
                $userBlog->blog_id=$blog->id;
                $userBlog->like=0;
                $userBlog->dislike=1;
                $userBlog->save();
            }
            return redirect()->back();
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error',$ex->getMessage()]);

        }

    }

    public function createComment(Request $request,$id)
    {
        try {
            $blog=Blog::find($id);
            if(Comment::where('blog_id',$blog->id)->where('user_id',auth()->user()->id)->first())
            {
                return redirect()->back()->with(['error','you have a comment before']);
            }
            else{
                $comment=new Comment();
                $comment->user_id=auth()->user()->id;
                $comment->blog_id=$blog->id;
                $comment->content=$request->comment;
                $comment->save();
            }


            return redirect()->back();
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error',$ex->getMessage()]);

        }

    }

    public function blogDetails($id)
    {
        $settings = Setting::find(1);
        $socials= Social::all();
        $blog = Blog::find($id);


        $recentblog = Blog::paginate(10);
        return view('blog-details', compact('settings','socials','blog','recentblog'));
    }


}
