<?php

namespace App\Http\Controllers\Persuratan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Disposisi;
use Session;
use DB;
use Auth;
use App\Surat;
use App\TenantUser;
use App\Tenant;
use File;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mentorsuratmasuk()
    {
        $disposisi = Disposisi::all();
        $surat = Surat::where([
            ['author_id', '=', Auth::user()->id],
            ['jenis_surat', '=', 'masuk'],
        ])->get();

        $this->data['disposisi'] = $disposisi;
        $this->data['surat'] = $surat;

        return view('surat.mentor.index', $this->data);
    }
    //Menampilkan view Surat keluar untuk mentor
    public function mentorsuratkeluar()
    {
        $surat = Surat::where([
            ['author_id', '=', Auth::user()->id],
            ['jenis_surat', '=' , 'keluar' ],
        ])->get();

        return view('surat.mentor.keluar', compact('surat'));
    }
    //Menampilkan view Surat masuk untuk Tenant
    public function tenantsuratmasuk()
    {
        $disposisi = Disposisi::get();
        $tenant = Auth::user()->tenants()->first();
        $surat = Surat::get();

        $disposisi = Disposisi::where([
            ['inkubator_id', '=', $tenant->inkubator_id],
        ])->latest()->paginate(10);

        $surat = Surat::where([
            ['author_id', '=', Auth::user()->id],
            ['priority_id', '=' , $tenant->priority ],
            ['jenis_surat', '=' , 'masuk' ],
        ])->get();

        $this->data['disposisi'] = $disposisi;
        $this->data['tenant'] = $tenant;
        $this->data['surat'] = $surat;

        return view('surat.tenant.index', $this->data );
    }
    //Menampilkan view Surat keluar untuk Tenant
    public function tenantsuratkeluar()
    {
        $surat = Surat::where([
            ['author_id', '=', Auth::user()->id],
            ['jenis_surat', '=' , 'keluar' ],
        ])->get();

        return view('surat.tenant.keluar', compact('surat'));
    }
    //Menampilkan view Surat keluar untuk User
    // public function usersuratmasuk()
    // {
    //     $disposisi = Disposisi::get();
    //     $tenant = TenantUser::get();

    //     return view('surat.user.index', compact('disposisi','tenant'));
    // }

    // public function usersuratkeluar()
    // {
    //     $surat = Surat::get();

    //     return view('surat.user.keluar', compact('surat'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surat = Surat::all();
        $priority = DB::table('priority')->get();
        $user = DB::table('users')->get();

        return view ('surat.Action.form', compact('user','priority'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $priority = DB::table('priority')->get();
        
        $user = DB::table('users')->get();
        // $surat = Surat::where('id', '!=', $id)->orderBy('name', 'asc')->get();

        $this->data['surat'] = $surat;
        $this->data['user'] = $user;
        $this->data['priority'] = $priority;
        return view('surat.Action.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tenantupdate(Request $request, $id)
    {
        $surat = Surat::find($id);
        $filename = $surat->dokumen;
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = Auth::user()->name.'_' .time() . '.' . $file->getClientOriginalName();
            $file->move('file/dokumen', $filename);
            File::delete('file/dokumen' . $surat->dokumen);
        }

        Surat::where('id', $surat->id)
        ->update ([
            'title' => $request->judul,
            'dari' => Auth::user()->email,
            'kepada' => $request->kepada,
            'perihal' => $request->perihal,
            'dokumen' => $filename,
            'author_id' => Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        
        if ($filename) {
            Session::flash('success', 'Surat Berhasil Dirubah');
        } else {
            Session::flash('error', 'Surat Gagal Dirubah');
        }

    	return redirect('/tenant/suratmasuk');
    }
    public function mentorupdate(Request $request, $id)
    {
        $surat = Surat::find($id);
        $filename = $surat->dokumen;
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = Auth::user()->name.'_' .time() . '.' . $file->getClientOriginalName();
            $file->move('file/dokumen', $filename);
            File::delete('file/dokumen' . $surat->dokumen);
        }

        Surat::where('id', $surat->id)
        ->update ([
            'title' => $request->judul,
            'dari' => Auth::user()->email,
            'kepada' => $request->kepada,
            'perihal' => $request->perihal,
            'dokumen' => $filename,
            'author_id' => Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        
        if ($filename) {
            Session::flash('success', 'Surat Berhasil Dirubah');
        } else {
            Session::flash('error', 'Surat Gagal Dirubah');
        }

    	return redirect('/mentor/suratmasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disposisi  = Disposisi::findOrFail($id);

        if ($disposisi->delete()) {
            Session::flash('success', 'Surat berhasil dihapus');
        }

        return back();
    
    }
    public function createkeluar()
    {
        $surat = Surat::all();
        $priority = DB::table('priority')->get();
        $user = DB::table('users')->get();

        return view ('surat.Action.formkeluar', compact('user','priority'));
        
    }
    //Untuk membuat Surat pada mentor degan jenis surat masuk
    public function mentorstore (Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf,jpg,png,jpeg',
            'judul' => 'required',
            'perihal' => 'required',
        ]);

        
        if ($request->has('file')) {
            $dokumen = $request->file('file');
            $name = Auth::user()->name . '_' .time();
            $fileName = $name . '.' . $dokumen->getClientOriginalName();

            $folder = 'file/dokumen';
            // $filePath = $dokumen->storeAs( $fileName, 'public');
            $filePath = $dokumen->move($folder, $fileName, 'public');

            DB::table('surat')->insert([
                'title' => $request->judul,
                'dari' => Auth::user()->email,
                'kepada' => $request->kepada,
                'perihal' => $request->perihal,
                'jenis_surat' => 1,
                'dokumen' => $fileName,
                'author_id' => Auth::user()->id,
                'priority_id' => $request->priority,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        
            if ($filePath) {
                Session::flash('success', 'Surat berhasil disimpan');
            } else {
                Session::flash('error', 'Surat Gagal Terkirim');
            }

        return redirect ('/mentor/suratmasuk');
        }
    }
    //Untuk membuat Surat pada mentor degan jenis surat keluar
    public function mentorstorekeluar (Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf,jpg,png,jpeg',
            'judul' => 'required',
            'perihal' => 'required',
        ]);

        
        if ($request->has('file')) {
            $dokumen = $request->file('file');
            $name = Auth::user()->name . '_' .time();
            $fileName = $name . '.' . $dokumen->getClientOriginalName();

            $folder = 'file/dokumen';
            // $filePath = $dokumen->storeAs( $fileName, 'public');
            $filePath = $dokumen->move($folder, $fileName, 'public');

            DB::table('surat')->insert([
                'title' => $request->judul,
                'dari' => Auth::user()->email,
                'kepada' => $request->kepada,
                'perihal' => $request->perihal,
                'jenis_surat' => 2,
                'dokumen' => $fileName,
                'author_id' => Auth::user()->id,
                'priority_id' => $request->priority,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        
            if ($filePath) {
                Session::flash('success', 'Surat berhasil disimpan');
            } else {
                Session::flash('error', 'Surat Gagal Terkirim');
            }

        return redirect ('/mentor/suratkeluar');
        }
    }

    //Untuk membuat Surat pada tenant degan jenis surat masuk
    public function tenantstore (Request $request)
    {
        $tenant = Auth::user()->tenants()->first();

        $request->validate([
            'file' => 'mimes:pdf,jpg,png,jpeg',
            'judul' => 'required',
            'perihal' => 'required',
        ]);

        
        if ($request->has('file')) {
            $dokumen = $request->file('file');
            $name = Auth::user()->name . '_' .time();
            $fileName = $name . '.' . $dokumen->getClientOriginalName();

            $folder = 'file/dokumen';
            // $filePath = $dokumen->storeAs( $fileName, 'public');
            $filePath = $dokumen->move($folder, $fileName, 'public');

            DB::table('surat')->insert([
                'title' => $request->judul,
                'dari' => Auth::user()->email,
                'kepada' => $request->kepada,
                'perihal' => $request->perihal,
                'jenis_surat' => 1,
                'dokumen' => $fileName,
                'author_id' => Auth::user()->id,
                'priority_id' => $tenant->priority,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        
            if ($filePath) {
                Session::flash('success', 'Surat berhasil disimpan');
            } else {
                Session::flash('error', 'Surat Gagal Terkirim');
            }

        return redirect ('tenant/suratmasuk');
        }
    }

    //Untuk membuat Surat pada tenant degan jenis surat Keluar
    public function tenantstorekeluar (Request $request)
    {
        $request->validate([
            'file' => 'mimes:pdf,jpg,png,jpeg',
            'judul' => 'required',
            'perihal' => 'required',
        ]);

        
        if ($request->has('file')) {
            $dokumen = $request->file('file');
            $name = Auth::user()->name . '_' .time();
            $fileName = $name . '.' . $dokumen->getClientOriginalName();

            $folder = 'file/dokumen';
            // $filePath = $dokumen->storeAs( $fileName, 'public');
            $filePath = $dokumen->move($folder, $fileName, 'public');

            DB::table('surat')->insert([
                'title' => $request->judul,
                'dari' => Auth::user()->email,
                'kepada' => $request->kepada,
                'perihal' => $request->perihal,
                'jenis_surat' => 2,
                'dokumen' => $fileName,
                'author_id' => Auth::user()->id,
                'priority_id' => $request->priority,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        
            if ($filePath) {
                Session::flash('success', 'Surat berhasil disimpan');
            } else {
                Session::flash('error', 'Surat Gagal Terkirim');
            }

        return redirect ('tenant/suratkeluar');
        }
    }
}
