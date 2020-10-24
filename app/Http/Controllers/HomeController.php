<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
        // return view('admin.dashboard');
    // }    
	public function index()
    {
		$user=Auth::user();
        if ( $user->hasRole('admin') ) {// do your magic here
			return redirect()->route('admin.home');
		}elseif($user->hasRole('inkubator')){
			return redirect()->route('inkubator.home');
		}elseif($user->hasRole('mentor')){
			return redirect()->route('mentor.home');
		}elseif($user->hasRole('tenant')){
			return redirect()->route('tenant.home');
		}elseif($user->hasRole('user')){
			return redirect()->route('user.home');
		}
		return redirect('/');
    }
}
