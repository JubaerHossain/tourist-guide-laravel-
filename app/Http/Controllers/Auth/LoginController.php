<?php

namespace App\Http\Controllers\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        // User role
        Toastr::success('You are logged in!', 'Success');
        $role = Auth::user()->role;
        if(in_array('admin', explode(',', Auth::user()->user_role->role->slug))){
            return '/admin/dashboard';
        }elseif(in_array('subadmin', explode(',', Auth::user()->user_role->role->slug))){
            return '/subadmin/dashboard';
        }
        elseif(in_array('guide', explode(',', Auth::user()->user_role->role->slug))){
            return '/guide/dashboard';
        }
        else{
            return '/home';
        }
    }
}
