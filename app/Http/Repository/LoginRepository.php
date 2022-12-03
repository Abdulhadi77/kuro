<?php


namespace App\Http\Repository;


use App\Http\IRepositories\ILoginRepository;
use App\Models\User;
use App\Notifications\ReferrerBonus;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;


class LoginRepository extends BaseRepository implements ILoginRepository
{

    public function model()
    {
        return User::class;
    }

    public function getLogin()
    {
        return view('auth.login');
    }
    public function Login($request)
    {
        $user=$this->model->where('email',$request->email)->first();
        if($user)
        {
            if (auth()->guard()->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {

                return redirect()->route('home');
            }
            else
            {
                return redirect()->back()->with(['error' => Lang::get('auth.something wrong in data input',[],Config::get('app.locale'))]);

            }
        }
        else
        {
            return redirect()->back()->with(['error' => Lang::get('auth.something wrong in data input',[],Config::get('app.locale'))]);

        }

    }
    public function Logout()
    {
        $gaurd = $this->getGaurd();
        $gaurd->logout();
        return redirect()->route('user.login');
    }
    private function getGaurd()
    {
        return auth();
    }

}
