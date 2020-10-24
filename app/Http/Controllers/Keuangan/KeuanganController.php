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
        $masuk = Keuangan::select(DB::raw("(SELECT SUM(jumlah) AS jumlah FROM arus_kas WHERE jenis='1') as count"))
        ->whereYear('tanggal', date('Y'))
        ->groupBy(DB::raw("Month(tanggal)","jenis","asc"))
        ->pluck('count');
        $keluar = Keuangan::select(DB::raw("(SELECT SUM(jumlah) AS jumlah FROM arus_kas WHERE jenis='0') as count"))
        ->whereYear('tanggal', date('Y'))
        ->groupBy(DB::raw("Month(tanggal)","jenis","asc"))
        ->pluck('count');
        $keuangan = Keuangan::orderBy('tanggal', 'asc')->whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->get();
        $pendapatan = Keuangan::orderBy('tanggal', 'asc')->get();
        //Menghitung Total
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if($row->jenis=='1')
            $total_masuk = $total_masuk + $row->jumlah;

            elseif($row->jenis=='0')
            $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;

        $kas_masuk = 0;
        $kas_keluar = 0;

        foreach ($pendapatan as $row) {
            if($row->jenis=='1')
            $kas_masuk = $kas_masuk + $row->jumlah;

            elseif($row->jenis=='0')
            $kas_keluar = $kas_keluar + $row->jumlah;
        }

        $saldo_kas = $kas_masuk - $kas_keluar;

        return view('keuangan.inkubator.index',compact('keuangan','masuk','keluar',"total",'total_masuk','total_keluar','saldo_kas','kas_masuk','kas_keluar'));

    }

    //FUNCTION MENTOR
    public function indexMentor() 
    {
        $arus = DB::table('arus_kas')->get();
        $keuangan = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();
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
        // dd($grafik);

        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;

        return view('keuangan.mentor.index', compact('keuangan', 'total', 'total_masuk', 'total_keluar', 'arus', 'grafik'));
    }

    //FUNCTION TENANT
    public function indexTenant()
    {

        $tenant = DB::table('tenant')->get();
        $arus = DB::table('arus_kas')->whereMonth('tanggal', date('m'))->get();
        $users = DB::table('users')->get();

        $keuangan = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select('users.id', 'tenant_user.user_id', 'arus_kas.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();

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
        $user = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();
        // Menghitung Totalan
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;

        return view('keuangan.index', compact('keuangan', 'grafik', 'total', 'total_masuk', 'total_keluar', 'tenant', 'user', 'arus'));
        // dd($user);
    }

    public function tambah()
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
    public function store(Request $request)
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
}
