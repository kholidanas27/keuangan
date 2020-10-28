<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Pengumuman;
use App\Priority;
use File;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Keuangan;
use App\User;

class KeuanganController extends Controller
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

    //FUNCTION INKUBATOR
    public function indexInkubator()
    {
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
            $masuk     = collect(DB::SELECT("SELECT SUM(jumlah) AS jumlah from arus_kas where month(tanggal)='$bulan'"))->first();
            $arus[] = $masuk->jumlah;
         }
        // $masuk = Keuangan::select(DB::raw("(SELECT SUM(jumlah) AS masuk FROM arus_kas WHERE jenis='1') as count"))
        //     ->whereYear('tanggal', date('Y'))
        //     ->groupBy(DB::raw("Month(tanggal)", "asc"))
        //     ->pluck('count');
            // dd($arus);
        $keluar = Keuangan::select(DB::raw("(SELECT SUM(jumlah) AS jumlah FROM arus_kas WHERE jenis='0') as count"))
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "jenis", "asc"))
            ->pluck('count');

        // Menampilkan Data Kedalam Grafik
        // $grafik = Keuangan::select(DB::raw("(SUM(jumlah)) as count"))
        //     ->whereYear('tanggal', date('Y'))
        //     ->groupBy(DB::raw("Month(tanggal)", "jenis", "asc"))
        //     ->pluck('count');

        // Menampilkan Data Keuangan
        $keuangan = Keuangan::orderBy('tanggal', 'asc')->whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->get();
        $pendapatan = Keuangan::orderBy('tanggal', 'asc')->get();
        // dd($keuangan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant')->get();

        // Menghitung Total Pada Bagian Table
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;
        
        // Menghitung Total pada Bagian Atas
        $kas_masuk = 0;
        $kas_keluar = 0;

        foreach ($pendapatan as $row) {
            if ($row->jenis == '1')
                $kas_masuk = $kas_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $kas_keluar = $kas_keluar + $row->jumlah;
        }

        $saldo_kas = $kas_masuk - $kas_keluar;

        
        return view('keuangan.mentor.index', compact('keuangan','tenant','categories', 'arus', "total", 'total_masuk', 'total_keluar', 'saldo_kas', 'kas_masuk', 'kas_keluar'));
    }
    // Fungsi Filter Inkubator
    public function inkubatorFilter(Request $request){
        $month = $request->month;
        $year = $request->year;
            
        $keuangan = Keuangan::orderBy('id','desc');
        if($year){
          $keuangan->whereYear('tanggal', '=', $year);
        }
        if($month){
          $keuangan->whereMonth('tanggal', '=', $month);
        }
        $keuangan = $keuangan->get();
        
        $grafik = Keuangan::select(DB::raw("(SUM(jumlah)) as count"))
            ->whereYear('tanggal', '=', $year)
            ->groupBy(DB::raw("Month(tanggal)", "jenis", "asc"))
            ->pluck('count');

        // Menampilkan Data Keuangan
        $pendapatan = Keuangan::orderBy('tanggal', 'asc')->get();
        // dd($keuangan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant')->get();

        // Menghitung Total Pada Bagian Table
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;
        
        // Menghitung Total pada Bagian Atas
        $kas_masuk = 0;
        $kas_keluar = 0;

        foreach ($pendapatan as $row) {
            if ($row->jenis == '1')
                $kas_masuk = $kas_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $kas_keluar = $kas_keluar + $row->jumlah;
        }

        $saldo_kas = $kas_masuk - $kas_keluar;        
        
        return view('keuangan.mentor.index',  compact('keuangan','tenant', 'grafik', "total", 'total_masuk', 'total_keluar'));
    }

    // Fungsi Filter Mentor
    public function mentorFilter(Request $request){
        $month = $request->month;
        $year = $request->year;
            
        $keuangan = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ]);
        if($year){
          $keuangan->whereYear('tanggal', '=', $year);
        }
        if($month){
          $keuangan->whereMonth('tanggal', '=', $month);
        }
        $keuangan = $keuangan->get();
        
        $grafik = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->select(DB::raw("(SUM(jumlah)) as count"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "asc"))
            // ->where('tenant_id', $keuangan->tenant_id)
            ->pluck('count');

        // Menampilkan Data Keuangan
        $pendapatan = Keuangan::orderBy('tanggal', 'asc')->get();
        // dd($keuangan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant')->get();

        // Menghitung Total Pada Bagian Table
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;
        
        // Menghitung Total pada Bagian Atas
        $kas_masuk = 0;
        $kas_keluar = 0;

        foreach ($pendapatan as $row) {
            if ($row->jenis == '1')
                $kas_masuk = $kas_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $kas_keluar = $kas_keluar + $row->jumlah;
        }

        $saldo_kas = $kas_masuk - $kas_keluar;        
        
        return view('keuangan.mentor.index',  compact('keuangan','tenant', 'grafik', "total", 'total_masuk', 'total_keluar'));
    }

    //FUNCTION MENTOR
    public function indexMentor()
    {
        // Menampilkan Data Keuangan Pada Bagian Table
        $keuangan = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();

        // Menampilkan Data Tenant
        $tenant = DB::table('tenant_mentor')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->get();

        // Menampilkan Data Keuangan Pada Bagian Grafik
        $grafik = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->select(DB::raw("(SUM(jumlah)) as count"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "asc"))
            // ->where('tenant_id', $keuangan->tenant_id)
            ->pluck('count');
        // dd($tenant);

        // Menghitung Total Pada Bagian Table
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;

        return view('keuangan.mentor.index', compact('keuangan','tenant', 'total', 'total_masuk', 'total_keluar', 'grafik'));
    }

    //FUNCTION TENANT
    public function indexTenant()
    {
        // Menampilkan Data Keuangan Pada Bagian Table
        $keuangan = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select('users.id', 'tenant_user.user_id', 'arus_kas.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();

        // Menampilkan Data Keuangan Pada Bagian Grafik
        $grafik = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select(DB::raw("(SUM(jumlah)) as count"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "asc"))
            ->pluck('count');
        // dd($grafik);
        
        // Relasi antara Tenant dengan User
        $user = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();

        // Menghitung Totalan Pada Bagian Table
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;

        return view('keuangan.index', compact('keuangan', 'grafik', 'total', 'total_masuk', 'total_keluar', 'user'));
        // dd($user);
    }

    public function tambahArus()
    {
        $user = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();

        $title = 'Tambah Data Arus Kas';
        $keuangan = DB::table('arus_kas')->get();
        $tenant = DB::table('tenant_user')->get();

        return view('keuangan.index', compact('keuangan', 'title', 'tenant'));
        // return response()->json($user);
    }
    public function storeArus(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'file' => 'required|file|mimes:png,jpeg,jpg',
            'tanggal' => 'required',
        ]);
        $file = $request->file;
        $filename = time() . Str::slug($request->get('keterangan')) . '.' . $file->getClientOriginalExtension();
        DB::table('arus_kas')->insert([
            'tenant_id' => $request->tenant_id,
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'foto' => $filename,
            'tanggal' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        $tujuan_upload = 'img/keuangan';
        $file->move($tujuan_upload, $filename);

        // \Session::flash('sukses', 'Berhasil Menambahkan Data Pengumuman');
        return redirect('/tenant/keuangan')->with('success', 'Menambahkan Data Arus Kas');
    }
    public function editArus($id)
    {

        $k = DB::table('arus_kas')->where('id', $id)->first();
        $tenant = DB::table('tenant')->get();
        $arus = DB::table('arus_kas')->get();
        $users = DB::table('users')->get();
        $keuangan = keuangan::find($id);

        return view('keuangan.index', compact('k', 'keuangan', 'users', 'tenant', 'arus'));
    }

    public function updateArus($id, Request $request)
    {

        $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'file' => 'required|file|mimes:png,jpeg,jpg',
            'tanggal' => 'required',
        ]);

        $keuangan = Keuangan::find($id);
        $filename = $keuangan->foto;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . Str::slug($request->get('keterangan')) . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = 'img/keuangan';
            $file->move($tujuan_upload, $filename);
            Keuangan::delete('img/keuangan/' . $keuangan->foto);
        }
        $keuangan->update([
            'tenant_id' => $request->tenant_id,
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'foto' => $filename,
            'tanggal' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('/tenant/keuangan', compact('keuangan'))->with(['update' => 'Edit Data Arus Kas']);
    }

    public function hapusArus($id)
    {

        $file = DB::table('arus_kas')->where('id', $id)->first();
        File::delete('img/keuangan/' . $file->foto);
        DB::table('arus_kas')->where('id', $id)->delete();

        return redirect('/tenant/keuangan')->with('delete', 'Menghapus Data Arus Kas');
    }

    public function storeLaba(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'file' => 'required|file|mimes:png,jpeg,jpg',
            'tanggal' => 'required',
        ]);
        $file = $request->file;
        $filename = time() . Str::slug($request->get('keterangan')) . '.' . $file->getClientOriginalExtension();
        DB::table('laba_rugi')->insert([
            'tenant_id' => $request->tenant_id,
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'foto' => $filename,
            'tanggal' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        $tujuan_upload = 'img/keuangan';
        $file->move($tujuan_upload, $filename);

        // \Session::flash('sukses', 'Berhasil Menambahkan Data Pengumuman');
        return redirect('/tenant/keuangan')->with('success', 'Menambahkan Data Arus Kas');
    }
}
