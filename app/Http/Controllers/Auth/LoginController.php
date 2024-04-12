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
    //protected $redirectTo = '/home';
    protected function authenticated()
    {
        if(Auth::user()->role_as=='1')
        {
            return redirect('dashboard')->with('status','Welcome to your admin dashboard!');
        }else if(Auth::user()->role_as=='2')
        {
            return redirect('cafedashboard')->with('status','Welcome to your cafe dashboard!');
        }
        else if(Auth::user()->role_as=='3')
        {
            return redirect('stationerydashboard')->with('status','Welcome to your cafe dashboard!');
        }
        else if(Auth::user()->role_as=='4')
        {
            return redirect('cafehome')->with('status','Welcome to College Cafe!');
        }
        else if(Auth::user()->role_as=='5')
        {
            return redirect('stationeryhome')->with('status','Welcome to College Stationery!');
        }
        elseif(Auth::user()->role_as=='0')
        {
            return redirect('/')->with('status','Logged in successfully!');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
