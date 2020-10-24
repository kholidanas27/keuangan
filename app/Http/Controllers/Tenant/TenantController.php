<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Priority;
use File;
use Auth;
use App\Tenant;
use DB;
use App\Pengumuman;

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
    public function index()
    {
		//$data['data']=Tenant::where('inkubator_id',Auth::user()->inkubator_id)->leftJoin('tenant_user',['tenant.id'=>'tenant_user.tenant_id'])->leftJoin('tenant_mentor',['tenant.id'=>'tenant_mentor.tenant_id'])->select('tenant.*','tenant_user.user_id as personil','tenant_mentor.user_id as mentor')->get();
		$data['data']=Tenant::where('inkubator_id',Auth::user()->inkubator_id)->leftJoin('priority',['tenant.priority'=>'priority.id'])->get();
        // return response()->json($data);
		return view('tenant.index',$data);
    }
	
	public function detail($kategori,$id)
    {
        return view('tenant.'.$kategori);
    }
	

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('inkubator_id', Auth::user()->inkubator_id)->where(function ($query) {
            $query->where('publish', 1);
        })->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('tenant.pengumuman', compact('pengumuman', 'kategori', 'inkubator'));
    }

    public function tenant()
    {

        $pengumuman = Pengumuman::where([['author_id', \Auth::user()->id], ['inkubator_id', 0]])->get();
        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('tenant.pengumuman', compact('pengumuman', 'kategori', 'inkubator'));
    }

    public function show($slug)
    {
        $pengumuman = DB::table('pengumuman')->where('slug', $slug)->get();
        return view('tenant.detail', ['pengumuman' => $pengumuman]);
    }

    public function kategori($id)
    {
        $pengumuman = Pengumuman::where([['priority_id', $id], ['inkubator_id', \Auth::user()->inkubator_id],['publish', 1]])->latest()->get();
        $kategori = DB::table('priority')->get();
        return view('tenant.pengumuman', compact('pengumuman', 'kategori'));

    }

    public function search(Request $request)
    {

        $keyword = $request->get('keyword');


        if ($keyword) {
            $pengumuman = pengumuman::where([['title', 'like', '%' . $keyword . '%'], ['inkubator_id', \Auth::user()->inkubator_id], ['publish', 1]])->get();
        } else {
            return redirect('tenant/pengumuman');
        }

        $kategori = DB::table('priority')->get();
        $inkubator = DB::table('inkubator')->get();
        return view('tenant.pengumuman', compact('pengumuman', 'kategori', 'inkubator', 'keyword'));
    }

}
