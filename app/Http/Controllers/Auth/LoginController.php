<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('throttle:5,1')->only('login');
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email'; // Login with Email
    }
}
