<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected function authenticated(Request $request, $user)
    {
        Toastr::success('', __("admin.welcome") . $user->full_name, ["positionClass" => "toast-top-center"]);
    }
}
