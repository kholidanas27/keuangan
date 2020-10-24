<?php

namespace App\Http\Controllers\Inkubator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InkubatorController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inkubator.inkubator-grid');
    }
	
	 public function tampil($view)
    {
		if($view=='grid' || $view=='list'){
        return view('inkubator.inkubator-'.$view);
		}else{
		return view('inkubator.dashboard');
		}
    }
	
}
