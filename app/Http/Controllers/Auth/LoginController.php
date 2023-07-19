<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\staff\StaffController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\secretary\SecretaryController;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated()
    {
        if (Auth::user()->user_type == 'admin') {
            return redirect('admin/dashboard');
        } else if (Auth::user()->user_type == 'secretary') {
            return redirect('secretary/dashboard');
        } else if (Auth::user()->user_type == 'staff') {
            return redirect('staff/dashboard');
        } else {
            return redirect('/')->with('status', 'Login Successfully');
        }
    }

}
//..
