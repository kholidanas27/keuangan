<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
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
    public function gagasan()
    {
        return view('admin.tenant.index');
    }
	
	 public function detailgagasan($id)
    {
        return view('admin.tenant.detail');
    }
	
	public function prastartup()
    {
        return view('admin.tenant.index');
    }
	
	 public function detailprastartup($id)
    {
        return view('admin.tenant.detail');
    }
	
	public function startup()
    {
        return view('admin.tenant.index');
    }
	
	 public function detailstartup($id)
    {
        return view('admin.tenant.detail');
    }
	
	public function scaleup()
    {
        return view('admin.tenant.index');
    }
	
	 public function detailscaleup($id)
    {
        return view('admin.tenant.detailscaleup');
    }
}
