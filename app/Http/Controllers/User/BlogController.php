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
use http\Env\Response;
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


    public function createLike(Request $request)
    {
        try {

            $blog=Blog::find($request->blog_id);
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
            $data=[
                'status'=>200,
                'likes'=>$blog->likes->count(),
                'dislikes'=>$blog->dislikes->count(),
            ];
            return response()->json($data);
          //  return redirect()->back();
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error',$ex->getMessage()]);

        }

    }

    public function createDisLike(Request $request)
    {
        try {
            $blog=Blog::find($request->blog_id);
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
            $data=[
                'status'=>200,
                'dislikes'=>$blog->dislikes->count(),
                'likes'=>$blog->likes->count(),
            ];
            return response()->json($data);
        }
        catch(\Exception $ex){
            return redirect()->back()->with(['error',$ex->getMessage()]);

        }

    }

    public function createComment(Request $request)
    {
        try {
            $blog=Blog::find($request->blog_id);



            if(Comment::where('blog_id',$blog->id)->where('user_id',auth()->user()->id)->first())
            {
                return response()->json([
                    'status' => false,
                    'content' => 'you have a comment before'
                ]);

           //     return redirect()->back()->with(['error','you have a comment before']);
            }
            else{
                $comment=new Comment();
                $comment->user_id=auth()->user()->id;
                $comment->blog_id=$blog->id;
                $comment->content=$request->comment;
                $comment->save();
            }


            $view = view('_showlist')->with(['comments' => $blog->comments])
                ->renderSections();


            return response()->json([
                'status' => true,
                'content' => $view['main'],
                'commentCount'=>$blog->comments->count()
            ]);

        }
        catch(\Exception $ex){
            dd($ex);

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
