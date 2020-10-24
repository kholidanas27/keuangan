<?php

namespace App\Http\Controllers\Aktifitas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AktifitasController extends Controller
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
		return view('aktifitas.index');
    }
}
