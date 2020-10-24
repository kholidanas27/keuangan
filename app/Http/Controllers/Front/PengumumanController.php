<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Pengumuman;
use App\Priority;
use Inkubator;
use File;
use Illuminate\Support\Facades\Auth;
use Users;

class PengumumanController extends Controller
{
    public function __construct()
    {
        //    $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pengumuman = Pengumuman::where([['inkubator_id', 0], ['publish', 1]])->latest()->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        $users = DB::table('users')->get();
        return view('front.pengumuman.list_pengumuman', compact('pengumuman', 'kategori', 'inkubator', 'users'));
    }

    public function show($slug)
    {
        $pengumuman = DB::table('pengumuman')
            ->join('users', 'pengumuman.author_id', '=', 'users.id')
            ->select('pengumuman.*', 'users.name')
            ->where([
                ['slug', $slug]
            ])
            ->get();

        $users = DB::table('users')->get();
        return view('front/pengumuman/detail_pengumuman', compact('users', 'pengumuman'));
    }
}
