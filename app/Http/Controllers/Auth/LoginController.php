<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
	protected function authenticated(Request $request, $user)
	{
		// if ( $user->hasRole('admin') ) {// do your magic here
			// return redirect()->route('admin.home');
		// }elseif($user->hasRole('inkubator')){
			// return redirect()->route('inkubator.home');
		// }elseif($user->hasRole('mentor')){
			// return redirect()->route('mentor.home');
		// }elseif($user->hasRole('tenant')){
			// return redirect()->route('tenant.home');
		// }elseif($user->hasRole('user')){
			// return redirect()->route('user.home');
		// }

	 // return redirect('/home');
	 return redirect('/');
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
