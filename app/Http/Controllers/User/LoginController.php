<?php

namespace App\Http\Controllers\User;
use App\Http\IRepositories\ILoginRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    protected $loginRepository;
    public function __construct(ILoginRepository   $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function  getLogin()
    {
        return $this->loginRepository->getLogin();
    }

    public function login(Request $request)
    {
        return $this->loginRepository->Login($request);
    }

    public function logoutUser()
    {
        return $this->loginRepository->Logout();


    }



}
