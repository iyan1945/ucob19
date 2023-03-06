<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class UserLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
      $this->middleware('guest')->except('logout'); 
    }

    public function guard()
    {
      dd(Auth::guard('users'));
     return Auth::guard('users');
    }
    public function showLoginForm()
    {
        return view('auth.userlogin');
    }
}
