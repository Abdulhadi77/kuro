<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\BFOTPlans;
use App\Models\Banner;
use App\Models\BFOTPlan;
use App\Models\ICO;
use App\Models\Blog;
use App\Models\Info;
use App\Models\Slide;
use App\Models\Social;
use App\Models\Setting;
use App\Models\VotePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Settings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::find(1);
        $slides = Slide::all();
        $infos= Info::all();
        $vote_planes= VotePlan::all();
        $socials= Social::all();
        $banners= Banner::all();
        return view('index',compact('settings','slides','infos','vote_planes','socials','banners'));
    }
    public function blog()
    {
        $settings = Setting::find(1);
        $socials= Social::all();
        $blogs = Blog::paginate(3);
        $recentblog = Blog::paginate(10);
        return view('blog', compact('settings','socials','blogs','recentblog'));
    }
    public function ICO()
    {
        $settings = Setting::find(1);
        $socials= Social::all();
        $ICOs = ICO::all();
        return view('ICOs', compact('settings','socials','ICOs'));
    }

    public function singleICO(ICO $ICO)
    {
        $settings = Setting::find(1);
        $socials= Social::all();

        return view('SingleICO', compact('settings','socials','ICO'));
    }

    public function Vote()
    {
        $settings = Setting::find(1);
        $socials= Social::all();
        $vote = VotePlan::all();
        return view('Vote-earn' , compact('settings','socials','vote'));
    }

    public function about()
    {

    }
    public function Beteam()
    {
        $settings = Setting::find(1);
        $socials= Social::all();
        $Bfotplane = BFOTPlan::all();
        return view('BeTeam', compact('settings','socials','Bfotplane'));
    }

}
