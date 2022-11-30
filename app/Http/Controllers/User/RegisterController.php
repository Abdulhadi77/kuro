<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\VerificationServices;
use App\Mail\NewMail;
use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    public function register()
    {
        return view('user.register');
    }

    public function create(RegisterRequest $request)
    {
        try {
            $user= User::create([
                'name' => $request->name,
                'user_name' => $request->user_name,
                'age' => $request->age,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->attempt(['email' => $request->input("email"), 'password' => $request->input("password")]);
            return redirect()->route('home');
        }catch(\Exception $ex){
            return redirect()->back()->with(['error',$ex->getMessage()]);

        }

    }





}
