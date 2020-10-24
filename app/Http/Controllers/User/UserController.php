<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Pengumuman;
use App\Priority;

class UserController extends Controller
{
    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('inkubator_id', 0)->get();
        return view('user.pengumuman', compact('pengumuman'));
    }

    public function show($slug)
    {
        $pengumuman = DB::table('pengumuman')->where('slug', $slug)->get();
        return view('user.detail', ['pengumuman' => $pengumuman]);
    }
}
