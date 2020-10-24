<?php

namespace App\Http\Controllers\Berita;

use Image;
use App\User;
use App\Berita;
use App\kategori;
use App\Komentar;
use App\Inkubator;
use App\BeritaLike;
use App\profil_user;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
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
        $berita = Berita::with('profil_user')->orderBy('created_at','desc')->paginate(10);
        $umum = Berita::with('profil_user')->where('inkubator_id','0')->orderBy('created_at','desc')->paginate(5);
        $hasil = Komentar::orderBy('created_at','desc')->paginate(5);

        return view('berita.index',compact('berita', 'umum', 'hasil'));
    }

    public function indexTenant()
    {

        $berita = Berita::with('profil_user')->orderBy('created_at','desc')->paginate(10);
        $umum = Berita::with('profil_user')->where('inkubator_id','0')->orderBy('created_at','desc')->paginate(5);
		$hasil = Komentar::orderBy('created_at','desc')->paginate(5);

        return view('berita.indexTenant',compact('berita', 'umum', 'hasil'));
    }

    public function search(Request $request){
        $cari = $request->input('search');
        $tgl = $request->input('tgl');
        $status = $request->input('status');
        if($status == '3'){
            $berita = Berita::where('created_at','LIKE', $tgl.'%')->where('tittle','LIKE','%'.$cari.'%')->orderBy('created_at','desc')->paginate(10);
        } else {
            $berita = Berita::where('publish','=',$status)->where('created_at','LIKE', $tgl.'%')->where('tittle','LIKE','%'.$cari.'%')->orderBy('created_at','desc')->paginate(10);
        }
        $hasil = Komentar::orderBy('created_at','desc')->paginate(5);
        $umum = Berita::with('profil_user')->where('inkubator_id','0')->orderBy('created_at','desc')->paginate(5);

        return view('berita.index', compact('berita','cari','umum','hasil'));
    }

    public function searchTenant(Request $request){
        $cari = $request->input('search');
        $tgl = $request->input('tgl');
        $status = $request->input('status');
        if($status == '3'){
            $berita = Berita::where('created_at','LIKE', $tgl.'%')->where('tittle','LIKE','%'.$cari.'%')->paginate(10);
        } else {
            $berita = Berita::where('publish','=',$status)->where('created_at','LIKE', $tgl.'%')->where('tittle','LIKE','%'.$cari.'%')->paginate(10);
        }
        $hasil = Komentar::orderBy('created_at','desc')->paginate(5);
        $umum = Berita::with('profil_user')->where('inkubator_id','0')->orderBy('created_at','desc')->paginate(5);

        return view('berita.indexTenant', compact('berita','cari','umum','hasil'));
    }

    public function create()
    {
        $kategori_berita =  kategori::orderBy('category')->get();
        $inkubator = Inkubator::orderBy('nama')->get();
        $penulis = profil_user::orderBy('nama')->get();

        return view('berita.formTambah',compact('kategori_berita','inkubator','penulis'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tittle'                => 'required',
            'berita'                => 'required',
            'berita_category_id'    => 'required|exists:berita_category,id',
            'publish'               => 'required',
            'author_id'             => 'required|exists:profil_user,user_id',
            'inkubator_id'          => 'required|exists:inkubator,id',
            'foto'                  => 'required|image|mimes:jpg,png,jpeg',

        ]);
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . Str::slug($request->tittle) . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(900,585);
            $image_resize->save(public_path('storage/berita/'.$filename));

            $berita = Berita::create([
                'tittle'                => $request->tittle,
                'slug'                  => Str::slug($request->tittle),
                'berita'                => $request->berita,
                'berita_category_id'    => $request->berita_category_id,
                'publish'               => $request->publish,
                'author_id'             => $request->author_id,
                'inkubator_id'          => $request->inkubator_id,
                'foto'                  => $filename,
                'views'                 => $request->views
            ]);

            $notification = array(
                'message' => 'Berita Berhasil Ditambahkan!',
                'alert-type' => 'success'
            );

            return redirect(route('inkubator.berita'))->with($notification);
        }
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        $komentar = komentar::where('berita_id', $berita->id)->delete();
        $like = BeritaLike::where('berita_id', $berita->id)->delete();
        File::delete(storage_path('app/public/berita/' . $berita->foto));

        $notification = array(
            'message' => 'Berita Berhasil Dihapus!',
            'alert-type' => 'error'
        );

        return redirect(route('inkubator.berita'))->with($notification);
    }

    public function edit($id)
    {
        $berita = berita::find($id);
        $kategori =  kategori::orderBy('category')->get();
        $inkubator = Inkubator::orderBy('nama')->get();
        $penulis = profil_user::orderBy('nama')->get();


        return view('berita.formEditBerita', compact('berita','kategori', 'inkubator','penulis'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tittle'                => 'required',
            'berita'                => 'required',
            'berita_category_id'    => 'required|exists:berita_category,id',
            'publish'               => 'required',
            'author_id'             => 'required|exists:profil_user,user_id',
            'inkubator_id'          => 'required|exists:inkubator,id',
            'foto'                  => 'required|image|mimes:jpg,png,jpeg',

        ]);
        $berita = Berita::find($id);
        $filename = $berita->foto;
        $notification = array(
            'message' => 'Berita Berhasil Diedit!',
            'alert-type' => 'success'
        );

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . Str::slug($request->tittle) . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(900,585);
            $image_resize->save(public_path('storage/berita/'.$filename));
            File::delete(storage_path('app/public/berita/' . $berita->foto));
        }
        $berita->update([
            'tittle'                => $request->tittle,
            'slug'                  => Str::slug($request->tittle),
            'berita'                => $request->berita,
            'berita_category_id'    => $request->berita_category_id,
            'publish'               => $request->publish,
            'author_id'             => $request->author_id,
            'inkubator_id'          => $request->inkubator_id,
            'foto'                  => $filename,
            'views'                 => $request->views
        ]);

        return redirect(route('inkubator.berita'))->with($notification);

    }

    public function show($slug)
    {
        $berita = Berita::find($slug);
        $berita = Berita::with(['beritaCategory','profil_user'])->where('slug', $slug)->first();
        $view = $berita->views + 1;
        $berita->update([
            'views' => $view,
        ]);
        $komentar = Komentar::where('berita_id',$berita->id)->orderBy('created_at','desc')->get();
        $total_komentar = Komentar::where('berita_id',$berita->id)->count();
        $total_like = BeritaLike::where('berita_id',$berita->id)->count();
        $umum = Berita::with('profil_user')->where('inkubator_id','0')->orderBy('created_at','desc')->paginate(5);

        return view('berita.showBerita', compact('berita','umum','komentar','total_komentar','total_like'));
      
    }

    public function showT($slug)
    {
        $berita = Berita::find($slug);
        $berita = Berita::with(['beritaCategory','profil_user'])->where('slug', $slug)->first();
        $view = $berita->views + 1;
        $berita->update([
            'views' => $view,
        ]);
        $komentar = Komentar::where('berita_id',$berita->id)->orderBy('created_at','desc')->get();
        $total_komentar = Komentar::where('berita_id',$berita->id)->count();
        $total_like = BeritaLike::where('berita_id',$berita->id)->count();
        $umum = Berita::with('profil_user')->where('inkubator_id','0')->orderBy('created_at','desc')->paginate(5);

        return view('berita.showBeritaTenant', compact('berita','umum','komentar','total_komentar','total_like'));
    }

	public function single()
    {
        $hasil = User::all();
        return view('front.single',['hasil'=>$hasil]);
    }

    public function komentar(Request $request)
    {
        Komentar::create([
            'berita_id' => $request->berita_id,
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar
        ]);

        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }

    public function likeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'berita_id' => 'required|exists:berita,id',
            'user_id'   => 'required|exists:users,id'
        ]);

        if ($validator->passes()) {
            BeritaLike::Create([
                'berita_id' => $request->berita_id,
                'user_id'   => $request->user_id,
            ]);
            return redirect()->back();
        }

        return redirect()->back();
    }
}
