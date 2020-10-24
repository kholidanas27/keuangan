<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProfilUser;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Pengumuman;
use App\Priority;
use File;
use App\Post;


class MentorController extends Controller
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
        $data['data'] = User::where(['users.inkubator_id' => Auth::user()->inkubator_id, 'role_user.role_id' => 4])->join('role_user', ['users.id' => 'role_user.user_id'])->leftJoin('profil_user', ['users.id' => 'profil_user.user_id'])->select('users.id as uid', 'profil_user.*')->get();
        return view('mentor.index', $data);
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('inkubator_id', Auth::user()->inkubator_id)->where(function ($query) {
            $query->where('publish', 1);
        })->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        // $pengumuman = Pengumuman::where()->get();
        return view('mentor.pengumuman', compact('pengumuman', 'kategori', 'inkubator'));
    }

    public function tenant()
    {
        $pengumuman = Pengumuman::where([['author_id', \Auth::user()->id], ['inkubator_id', 0]])->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('mentor.pengumuman', compact('pengumuman', 'kategori', 'inkubator'));
    }

    public function show($slug)
    {
        $pengumuman = DB::table('pengumuman')->where('slug', $slug)->get();
        return view('mentor.detail', ['pengumuman' => $pengumuman]);
    }
    public function kategori($id)
    {
        $pengumuman = Pengumuman::where([['priority_id', $id], ['inkubator_id', \Auth::user()->inkubator_id], ['publish', 1]])->latest()->get();
        $kategori = DB::table('priority')->get();
        return view('mentor.pengumuman', compact('pengumuman', 'kategori'));
    }

    public function search(Request $request)
    {

        $keyword = $request->get('keyword');


        if ($keyword) {
            $pengumuman = Pengumuman::where([['title', 'like', '%' . $keyword . '%'], ['inkubator_id', \Auth::user()->inkubator_id], ['publish', 1]])->get();
        }

        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('mentor.pengumuman', compact('pengumuman', 'kategori', 'inkubator', 'keyword'));

    }
}
