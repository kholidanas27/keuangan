<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
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
        return view('produk.index');
    }
	
	public function kategori($kategori)
    {
        return view('produk.index');
    }
	
	public function detail($kategori,$id)
    {
        return view('produk.index');
    }
}
