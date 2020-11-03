<?php

namespace App\Http\Controllers\Pengumuman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Pengumuman;
use App\Priority;
use File;
use Illuminate\Support\Facades\Auth;
use App\Post;


class PengumumanController extends Controller
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

        $pengumuman = Pengumuman::where('author_id', \Auth::user()->id)->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('pengumuman.index', compact('pengumuman', 'kategori', 'inkubator'));
    }

    public function tenant()
    {

        $pengumuman = Pengumuman::where([['author_id', \Auth::user()->id], ['inkubator_id', 0]])->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('pengumuman.index', compact('pengumuman', 'kategori', 'inkubator'));
    }

    public function tambah()
    {
        $title = 'New Pengumuman';
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();

        return view('pengumuman.pengumuman_add', compact('kategori', 'inkubator', 'title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori' => 'required',
            'inkubator' => 'required',
            'pengumuman' => 'required',
            'file' => 'required|file|mimes:png,jpeg,jpg,pdf',
        ]);
        $file = $request->file;
        $filename = time() . Str::slug($request->get('title')) . '.' . $file->getClientOriginalExtension();
        DB::table('pengumuman')->insert([
            'title' => $request->title,
            'slug' => Str::slug($request->get('title')),
            'priority_id' => $request->kategori,
            'inkubator_id' => $request->inkubator,
            'pengumuman' => $request->pengumuman,
            'author_id' => \Auth::user()->id,
            'foto' => $filename,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        $tujuan_upload = 'img/pengumuman';
        $file->move($tujuan_upload, $filename);

        // \Session::flash('sukses', 'Berhasil Menambahkan Data Pengumuman');
        return redirect('/inkubator/pengumuman')->with('success', 'Menambahkan Data Pengumuman');
    }

    public function show($slug)
    {
        $pengumuman = DB::table('pengumuman')->where('slug', $slug)->get();
        return view('pengumuman.detail', ['pengumuman' => $pengumuman]);
    }

    public function edit($id)
    {

        $title = 'Edit Pengumuman';
        $p = DB::table('pengumuman')->where('id', $id)->first();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        $pengumuman = pengumuman::find($id);
        return view('pengumuman.pengumuman_edit', compact('title', 'p', 'kategori', 'inkubator'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori' => 'required',
            'inkubator' => 'required',
            'pengumuman' => 'required',
            'foto' => 'nullable|file|mimes:png,jpeg,jpg,pdf',
        ]);

        $pengumuman = Pengumuman::find($id);
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        $filename = $pengumuman->foto;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . Str::slug($request->get('title')) . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = 'img/pengumuman';
            $file->move($tujuan_upload, $filename);
            File::delete('img/pengumuman/' . $pengumuman->foto);
        }
        $pengumuman->update([
            'title' => $request->title,
            'slug' => Str::slug($request->get('title')),
            'priority_id' => $request->kategori,
            'inkubator_id' => $request->inkubator,
            'pengumuman' => $request->pengumuman,
            'foto'       => $filename,
            'author_id' => Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        // if ($request->hasfile('foto')) {
        //     $file = $request->file('foto');
        //     $extension = $file->getClientOriginalExtension();
        //     $file->move($tujuan_upload, $file->getClientOriginalName());
        //     $file->first();
        // } else {
        //     $file = $pengumuman->foto;
        // }

        // $pengumuman->update($file);
        // $foto->save();
        // $file = $request->file;
        // $tujuan_upload = 'img/pengumuman';
        // $file->move($tujuan_upload, $file->getClientOriginalName());
        return redirect('inkubator/pengumuman')->with(['update' => 'Edit Data Pengumuman']);
    }

    public function hapus($id)
    {

        $file = DB::table('pengumuman')->where('id', $id)->first();
        File::delete('img/pengumuman/' . $file->foto);
        DB::table('pengumuman')->where('id', $id)->delete();

        return redirect('inkubator/pengumuman')->with('delete', 'Menghapus Data Pengumuman');
    }

    public function status($id)
    {
        $pengumuman = DB::table('pengumuman')->where('id', $id)->first();

        $status = $pengumuman->publish;

        if ($status == 1) {
            DB::table('pengumuman')->where('id', $id)->update([
                'publish' => 0
            ]);
        } else {
            DB::table('pengumuman')->where('id', $id)->update([
                'publish' => 1
            ]);
        }
        // \Session::flash('sukses', 'Berhasil Merubah Status Pengumuman');
        return redirect('inkubator/pengumuman')->with('status', 'Berhasil Merubah Status Pengumuman');
    }

    public function search(Request $request)
    {

        $keyword = $request->get('keyword');


        if ($keyword) {
            $pengumuman = pengumuman::where([['title', 'like', '%' . $keyword . '%'], ['author_id', \Auth::user()->id]])->get();
        } else {
            return redirect('inkubator/pengumuman');
        }

        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('pengumuman.index', compact('pengumuman', 'kategori', 'inkubator', 'keyword'));
    }
}
