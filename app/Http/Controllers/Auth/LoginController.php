<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/category';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('login');

        // Get the session key for this user
   //     $sessionKey = $this->guard()->getName();
       // return $sessionKey;

        // Logout current user by guard
       // $this->guard()->logout();

        // Delete single session key (just for this user)
//        session()->forget($sessionKey);

        // After logout, redirect to login screen again
     //   return redirect()->route('admin.login');


    }

    public function checkLogin()
    {

    }
}
