<?php

namespace App\Http\Controllers\Persuratan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;
use Auth;
use App\User;
use App\Surat;
use Session;
use App\Disposisi;
use App\Priority;



class PersuratanController extends Controller
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


        $surat = Surat::all();
        $priority = DB::table('priority')->get();

        return view('surat.index', compact('surat','priority'));
    }

    public function create()
    {
        $surat = Surat::all();
        $priority = DB::table('priority')->get();
        $user = DB::table('users')->get();

        return view ('surat.form', compact('user','priority'));
        
    }

    public function createkeluar()
    {
        $surat = Surat::all();
        $priority = DB::table('priority')->get();
        $user = DB::table('users')->get();

        return view ('surat.formkeluar', compact('user','priority'));
        
    }

    public function store (Request $request)
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

        return redirect ('inkubator/surat');
        }
    }

    public function storekeluar (Request $request)
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

            return redirect ('inkubator/surat');
        }
    }

    public function show ($id)
    {
        $surat = Surat::where('surat.id', $id)
        ->leftJoin('profil_user',['profil_user.user_id' => 'surat.kepada'])
        ->leftjoin('users',['surat.kepada'=>'users.id'])
        ->select('surat.*','profil_user.nama','users.email')
        ->get();
        $user = User::where('email', $id )->get();

        //dd($surat, $user);
        // return response()->json($surat);
        return view ('surat.detail', compact('surat', 'user'));

    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $priority = DB::table('priority')->get();
        
        $user = DB::table('users')->get();
        // $surat = Surat::where('id', '!=', $id)->orderBy('name', 'asc')->get();

        $this->data['surat'] = $surat;
        $this->data['user'] = $user;
        $this->data['priority'] = $priority;
        return view('surat.edit', $this->data);
    }

    public function update(Request $request, $id)
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
            'priority_id' => $request->priority,
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

    	return redirect ('/inkubator/surat');
    }

    public function destroy($id)
    {
        $surat  = Surat::find($id);
        $surat->Disposisi()->detach();
  
        if ($surat->delete()) {
            Session::flash('success', 'Surat berhasil dihapus');
        }

        return back();
    }

    public function disposisi($id)
    {
        $surat = Surat::findOrFail($id);
        
        $user = DB::table('users')->get();

        $this->data['surat'] = $surat;
        $this->data['user'] = $user;
        return view('surat.disposisi', $this->data);
        
    }

    public function disposisiupdate( Request $request, Surat $surat)
    {
        

        Surat::where('id', $surat->id)
        ->update([
            'kepada'=> $request->kepada,
            'jenis_surat'=> 2,
            ]);

        DB::table('surat_disposisi')->insert([

            'user_id' => $request->kepada,
            'surat_id' => $surat->id,
            'author_id' => $surat->author_id,
            'inkubator_id' => Auth::user()->inkubator_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        Session::flash('disposisi', 'Surat berhasil disposisi');

        return redirect('inkubator/surat');


    }
    public function detail ($id)
    {
        $surat = Surat::where('surat.id', $id)
        ->leftJoin('profil_user',['profil_user.user_id' => 'surat.kepada'])
        ->leftjoin('users',['surat.kepada'=>'users.id'])
        ->select('surat.*','profil_user.nama','users.email')
        ->get();
        $user = User::where('email', $id )->get();

        //dd($surat, $user);
        return view ('surat.Action.detail', compact('surat', 'user'));

    }
}
