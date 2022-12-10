<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendMail;
use App\Models\Social;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ReferrerBonus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['required', 'integer', 'min:10'],
            'phone' =>['required'],
            'user_name' => ['required', 'string', 'unique:users', 'alpha_dash', 'min:3', 'max:30'],
            'eth_address' => ['string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        $referrer = User::whereUser_name(session()->pull('referrer'))->first();
       // dd($data['phone']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_name' => $data['user_name'],
            'age' => $data['age'],
            'phone' => $data['phone'],
            'referrer_id' => $referrer ? $referrer->id : null,
            //'eth_address' => $data['eth_address'],
        ]);
    }

    /**
     * Show the application registration form. (Custom)
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }
        $settings = Setting::find(1);
        $socials = Social::all();
        return view('auth.register',compact('settings','socials'));
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        if ($user->referrer_id !== null) {

            $main_user=User::where('id',$user->referrer_id)->first();

            $details = [
                'title' => 'Registered in your location by '.$user->email,
                'body' => 'There Is one User His Name '.$user->name.' '. 'Registered By Your Location'
            ];

            Mail::to($main_user->email)->send(new SendMail($details));

            //Notification::send($user->referrer, new ReferrerBonus($user));
        }

        return redirect($this->redirectPath());
    }
}
