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
use App\labaRugi;

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
    public function indexInkubatorKas()
    {
        // DATA TABLE ARUS KAS
        // Menampilkan Data Kedalam Grafik
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
            $masuk     = collect(DB::SELECT("SELECT SUM(IF(jenis='1', jumlah, 0)) AS totalMasuk from arus_kas where Month(tanggal)='$bulan'"))->first();
            $keluar     = collect(DB::SELECT("SELECT SUM(IF(jenis='0', jumlah, 0)) AS totalKeluar from arus_kas where Month(tanggal)='$bulan'"))->first();
            $arusMasuk[] = $masuk->totalMasuk;
            $arusKeluar[] = $keluar->totalKeluar;
            $totalArus[] = $masuk->totalMasuk - $keluar->totalKeluar;
        }

        // Menampilkan Data Keuangan
        $keuangan = Keuangan::orderBy('tanggal', 'asc')->whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->get();
        $pendapatan = Keuangan::orderBy('tanggal', 'asc')->get();
        // dd($pendapatan);
        
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
        // dd($saldo_kas);
        // DATA TABLE LABA RUGI

        return view('keuangan.dashboard.arus_kas', compact('keuangan','tenant','categories', 'arusMasuk','arusKeluar','totalArus','total', 'total_masuk', 'total_keluar', 'saldo_kas', 'kas_masuk', 'kas_keluar'));
    }
    // Fungsi Filter Inkubator
    public function inkubatorFilterKas(Request $request){
        // DATA TABLE ARUS KAS
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
        
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
            $masuk     = collect(DB::SELECT("SELECT SUM(IF(jenis='1', jumlah, 0)) AS totalMasuk from arus_kas where Month(tanggal)='$bulan'"))->first();
            $keluar     = collect(DB::SELECT("SELECT SUM(IF(jenis='0', jumlah, 0)) AS totalKeluar from arus_kas where Month(tanggal)='$bulan'"))->first();
            $arusMasuk[] = $masuk->totalMasuk;
            $arusKeluar[] = $keluar->totalKeluar;
        }

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
        // dd($saldo_kas);
        // DATA TABLE LABA RUGI

        return view('keuangan.dashboard.arus_kas',  compact('keuangan','tenant', 'arusMasuk','arusKeluar','saldo_kas','categories', 'total', 'total_masuk', 'total_keluar'));
    }
    public function indexInkubatorLaba()
    {
        // DATA TABLE ARUS KAS
        // Menampilkan Data Kedalam Grafik
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
            $penghasilan     = collect(DB::SELECT("SELECT SUM(IF(jenis='1', jumlah, 0)) AS totalPenghasilan from laba_rugi where Month(tanggal)='$bulan'"))->first();
            $beban     = collect(DB::SELECT("SELECT SUM(IF(jenis='0', jumlah, 0)) AS totalBeban from laba_rugi where Month(tanggal)='$bulan'"))->first();
            $labaMasuk[] = $penghasilan->totalPenghasilan;
            $labaKeluar[] = $beban->totalBeban;
        }

        // Menampilkan Data Keuangan
        $labaRugi = labaRugi::orderBy('tanggal', 'asc')->whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->get();
        $labaBersih = labaRugi::orderBy('tanggal', 'asc')->get();
        // dd($pendapatan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant')->get();

        // Menghitung Total Pada Bagian Table
        $masuk_labaRugi = 0;
        $keluar_labaRugi = 0;

        foreach ($labaRugi as $row) {
            if ($row->jenis == '1')
                $masuk_labaRugi = $masuk_labaRugi + $row->jumlah;

            elseif ($row->jenis == '0')
                $keluar_labaRugi = $keluar_labaRugi + $row->jumlah;
        }

        $totalLaba = $masuk_labaRugi - $keluar_labaRugi;
        
        // Menghitung Total pada Bagian Atas
        $laba_masuk = 0;
        $laba_keluar = 0;

        foreach ($labaBersih as $row) {
            if ($row->jenis == '1')
                $laba_masuk = $laba_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $laba_keluar = $laba_keluar + $row->jumlah;
        }

        $laba_bersih = $laba_masuk - $laba_keluar;
        // dd($saldo_kas);
        // DATA TABLE LABA RUGI

        return view('keuangan.dashboard.laba_rugi', compact('labaRugi','tenant','totalLaba','masuk_labaRugi','keluar_labaRugi', 'laba_bersih', 'laba_masuk' , 'laba_keluar', 'categories', 'labaMasuk', 'labaKeluar' ));
    }
    // Fungsi Filter Inkubator
    public function inkubatorFilterLaba(Request $request){
        // DATA TABLE ARUS KAS
        $month = $request->month;
        $year = $request->year;
            
        $labaRugi = labaRugi::orderBy('id','desc');
        if($year){
          $labaRugi->whereYear('tanggal', '=', $year);
        }
        if($month){
          $labaRugi->whereMonth('tanggal', '=', $month);
        }
        $labaRugi = $labaRugi->get();
        
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
            $penghasilan     = collect(DB::SELECT("SELECT SUM(IF(jenis='1', jumlah, 0)) AS totalPenghasilan from laba_rugi where Month(tanggal)='$bulan'"))->first();
            $beban     = collect(DB::SELECT("SELECT SUM(IF(jenis='0', jumlah, 0)) AS totalBeban from laba_rugi where Month(tanggal)='$bulan'"))->first();
            $labaMasuk[] = $penghasilan->totalPenghasilan;
            $labaKeluar[] = $beban->totalBeban;
        }

        // Menampilkan Data Keuangan
        $labaBersih = Keuangan::orderBy('tanggal', 'asc')->get();
        // dd($keuangan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant')->get();

        // Menghitung Total Pada Bagian Table
        $masuk_labaRugi = 0;
        $keluar_labaRugi = 0;

        foreach ($labaRugi as $row) {
            if ($row->jenis == '1')
                $masuk_labaRugi = $masuk_labaRugi + $row->jumlah;

            elseif ($row->jenis == '0')
                $keluar_labaRugi = $keluar_labaRugi + $row->jumlah;
        }

        $totalLaba = $masuk_labaRugi - $keluar_labaRugi;
        
        // Menghitung Total pada Bagian Atas
        $laba_masuk = 0;
        $laba_keluar = 0;

        foreach ($labaBersih as $row) {
            if ($row->jenis == '1')
                $laba_masuk = $laba_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $laba_keluar = $laba_keluar + $row->jumlah;
        }

        $laba_bersih = $laba_masuk - $laba_keluar;        
        // dd($saldo_kas);
        // DATA TABLE LABA RUGI

        return view('keuangan.dashboard.laba_rugi',  compact('labaRugi','tenant','totalLaba','masuk_labaRugi','keluar_labaRugi', 'laba_bersih', 'laba_masuk' , 'laba_keluar', 'categories', 'labaMasuk', 'labaKeluar'));
    }
    
    //FUNCTION MENTOR
    public function indexMentorKas()
    {
        // DATA TABLE ARUS KAS
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
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
        
        // Menampilkan Data Keuangan Pada Bagian Grafik Masuk
        $masuk = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='1', jumlah, 0)) AS totalMasuk"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $arusMasuk[] = $masuk->totalMasuk;

        // Menampilkan Data Keuangan Pada Bagian Grafik Keluar
        $keluar = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='0', jumlah, 0)) AS totalKeluar"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $arusKeluar[] = $keluar->totalKeluar;
        }
        // dd($arusMasuk);
        $pendapatan = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])->get();
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
        
        return view('keuangan.dashboard.arus_kas', compact('keuangan','tenant','saldo_kas','kas_masuk','kas_keluar','arusMasuk','arusKeluar','categories', 'total', 'total_masuk', 'total_keluar'));
    }

    // Fungsi Filter Mentor
    public function mentorFilterKas(Request $request){
        // DATA TABLE ARUS KAS
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
        
        // Menampilkan Data Keuangan Pada Bagian Grafik
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){

        // Menampilkan Data Keuangan Pada Bagian Grafik Masuk
        $masuk = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='1', jumlah, 0)) AS totalMasuk"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $arusMasuk[] = $masuk->totalMasuk;
            
        // Menampilkan Data Keuangan Pada Bagian Grafik Keluar
        $keluar = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='0', jumlah, 0)) AS totalKeluar"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $arusKeluar[] = $keluar->totalKeluar;
        }

        // Menampilkan Data Keuangan
        $pendapatan = DB::table('tenant_mentor')
            ->join('arus_kas', 'tenant_mentor.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])->get();
        // dd($keuangan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant_mentor')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->get();

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
        
        return view('keuangan.dashboard.arus_kas',  compact('keuangan','tenant', 'arusMasuk','arusKeluar','categories','saldo_kas', 'total', 'total_masuk', 'total_keluar'));
    }

    public function indexMentorLaba()
    {
        // DATA TABLE LABA RUGI
        // Menampilkan Data Keuangan Pada Bagian Table
        $labaRugi = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'laba_rugi.*', 'tenant.*')
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
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
        
        // Menampilkan Data Keuangan Pada Bagian Grafik Masuk
        $penghasilan = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='1', jumlah, 0)) AS totalPenghasilan"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $labaMasuk[] = $penghasilan->totalPenghasilan;

        // Menampilkan Data Keuangan Pada Bagian Grafik Keluar
        $beban = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='0', jumlah, 0)) AS totalBeban"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $labaKeluar[] = $beban->totalBeban;
        }
        // dd($arusMasuk);
        $labaBersih = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'laba_rugi.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])->get();
        // Menghitung Total Pada Bagian Table

        $masuk_labaRugi = 0;
        $keluar_labaRugi = 0;

        foreach ($labaRugi as $row) {
            if ($row->jenis == '1')
                $masuk_labaRugi = $masuk_labaRugi + $row->jumlah;

            elseif ($row->jenis == '0')
                $keluar_labaRugi = $keluar_labaRugi + $row->jumlah;
        }

        
        $totalLaba = $masuk_labaRugi - $keluar_labaRugi;

        // Menghitung Total pada Bagian Atas
        $laba_masuk = 0;
        $laba_keluar = 0;

        foreach ($labaBersih as $row) {
            if ($row->jenis == '1')
                $laba_masuk = $laba_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $laba_keluar = $laba_keluar + $row->jumlah;
        }

        $laba_bersih = $laba_masuk - $laba_keluar;
        
        return view('keuangan.dashboard.laba_rugi', compact('labaRugi','tenant','totalLaba','masuk_labaRugi','keluar_labaRugi', 'laba_bersih', 'laba_masuk' , 'laba_keluar', 'categories', 'labaMasuk', 'labaKeluar' ));
    }

    // Fungsi Filter Mentor
    public function mentorFilterLaba(Request $request){
        // DATA TABLE ARUS LABA RUGI
        $month = $request->month;
        $year = $request->year;
            
        $labaRugi = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'laba_rugi.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ]);
        if($year){
          $labaRugi->whereYear('tanggal', '=', $year);
        }
        if($month){
          $labaRugi->whereMonth('tanggal', '=', $month);
        }
        $labaRugi = $labaRugi->get();
        
        // Menampilkan Data Keuangan Pada Bagian Grafik
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){

        // Menampilkan Data Keuangan Pada Bagian Grafik Masuk
        $penghasilan = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='1', jumlah, 0)) AS totalPenghasilan"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $labaMasuk[] = $penghasilan->totalPenghasilan;
            
        // Menampilkan Data Keuangan Pada Bagian Grafik Keluar
        $beban = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='0', jumlah, 0)) AS totalBeban"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $labaKeluar[] = $beban->totalBeban;
        }

        // Menampilkan Data Keuangan
        $labaBersih = DB::table('tenant_mentor')
            ->join('laba_rugi', 'tenant_mentor.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.user_id', 'laba_rugi.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])->get();
        // dd($keuangan);
        
        // Menampilkan Tenant
        $tenant = DB::table('tenant_mentor')
            ->join('users', 'tenant_mentor.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_mentor.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_mentor.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->get();

        // Menghitung Total Pada Bagian Table
        $masuk_labaRugi = 0;
        $keluar_labaRugi = 0;

        foreach ($labaRugi as $row) {
            if ($row->jenis == '1')
                $masuk_labaRugi = $masuk_labaRugi + $row->jumlah;

            elseif ($row->jenis == '0')
                $keluar_labaRugi = $keluar_labaRugi + $row->jumlah;
        }
        
        $totalLaba = $masuk_labaRugi - $keluar_labaRugi;

        // Menghitung Total pada Bagian Atas
        $laba_masuk = 0;
        $laba_keluar = 0;

        foreach ($labaBersih as $row) {
            if ($row->jenis == '1')
                $laba_masuk = $laba_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $laba_keluar = $laba_keluar + $row->jumlah;
        }

        $laba_bersih = $laba_masuk - $laba_keluar;        
        
        return view('keuangan.dashboard.laba_rugi',  compact('labaRugi','tenant','totalLaba','masuk_labaRugi','keluar_labaRugi', 'laba_bersih', 'laba_masuk' , 'laba_keluar', 'categories', 'labaMasuk', 'labaKeluar'));
    }

    //FUNCTION TENANT
    public function indexTenant()
    {
        $label = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $tenant = DB::table('tenant_user')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_user.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_user.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->get();
        // dd($tenant);
        // DATA TABLE ARUS KAS
        $users = DB::table('users')->get();
        // dd($users);

        $keuangan = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select('users.id', 'tenant_user.user_id', 'arus_kas.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();
            // dd($keuangan);
        
        $labaRugi = DB::table('tenant_user')
            ->join('laba_rugi', 'tenant_user.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select('users.id', 'tenant_user.user_id', 'laba_rugi.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();

        // Menampilkan Data Keuangan Pada Bagian Grafik
        $categories = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($bulan=1;$bulan < 13;$bulan++){
        
        // Menampilkan Data Keuangan Pada Bagian Grafik Masuk
        $masuk = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select(DB::raw("SUM(IF(jenis='1', jumlah, 0)) AS totalMasuk"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $arusMasuk[] = $masuk->totalMasuk;

        // Menampilkan Data Keuangan Pada Bagian Grafik Keluar
        $keluar = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select(DB::raw("SUM(IF(jenis='0', jumlah, 0)) AS totalKeluar"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $arusKeluar[] = $keluar->totalKeluar;

        // Menampilkan Data Laba Rugi pada bagian Grafik 
        $penghasilan = DB::table('tenant_user')
            ->join('laba_rugi', 'tenant_user.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='1', jumlah, 0)) AS totalPenghasilan"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $labaMasuk[] = $penghasilan->totalPenghasilan;
            
        // Menampilkan Data Laba Rugi Pada Bagian Grafik 
        $beban = DB::table('tenant_user')
            ->join('laba_rugi', 'tenant_user.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            // ->select('users.id', 'tenant_mentor.user_id', 'arus_kas.*')
            ->select(DB::raw("SUM(IF(jenis='0', jumlah, 0)) AS totalBeban"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', '=', $bulan)
            ->first();
            $labaKeluar[] = $beban->totalBeban;
        
        
        // Menampilkan total Laba Rugi di Grafik
        $totalLabaBersih[] = $penghasilan->totalPenghasilan - $beban->totalBeban;
        
        // dd($totalLabaBersih);
        }
        
        $pendapatan = DB::table('tenant_user')
            ->join('arus_kas', 'tenant_user.tenant_id', '=', 'arus_kas.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_user.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_user.user_id', 'arus_kas.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])->get();

        // Relasi antara Tenant dengan User
        $user = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();
        // dd($user);
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

        // Menghitung totalan pada bagian atas
        $kas_masuk = 0;
        $kas_keluar = 0;

        foreach ($pendapatan as $row) {
            if ($row->jenis == '1')
                $kas_masuk = $kas_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $kas_keluar = $kas_keluar + $row->jumlah;
        }

        $saldo_kas = $kas_masuk - $kas_keluar;

        $labaBersih = DB::table('tenant_user')
            ->join('laba_rugi', 'tenant_user.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->join('tenant', 'tenant_user.tenant_id', '=', 'tenant.id')            
            ->select('users.id', 'tenant_user.user_id', 'laba_rugi.*', 'tenant.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])->get();

        $userId = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();

        // Menghitung Totalan
        $masuk_labaRugi = 0;
        $keluar_labaRugi = 0;

        foreach ($labaRugi as $row) {
            if ($row->jenis == '1')
                $masuk_labaRugi = $masuk_labaRugi + $row->jumlah;

            elseif ($row->jenis == '0')
                $keluar_labaRugi = $keluar_labaRugi + $row->jumlah;
        }

        $totalLaba = $masuk_labaRugi - $keluar_labaRugi;

        // Menghitung Total pada Bagian Atas
        $laba_masuk = 0;
        $laba_keluar = 0;

        foreach ($labaBersih as $row) {
            if ($row->jenis == '1')
                $laba_masuk = $laba_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $laba_keluar = $laba_keluar + $row->jumlah;
        }

        $laba_bersih = $laba_masuk - $laba_keluar;
        
        // $ArusMasukTotal = 0;
        // $ArusKeluarTotal = 0;

        // MENGHITUNG SALDO OTOMATIS
        // foreach ($keuangan as $row) {
        //     if($row->jenis== '1' > $ArusKeluarTotal)
        //         $ArusKasMasuk = $total + $total_masuk;
            
        //     elseif ($row->jenis== '0' > $ArusMasukTotal)
        //         $ArusKasKeluar = $total - $total_keluar;
        // }

        // dd($ArusKasMasuk);

        return view('keuangan.index', compact(
            'keuangan',
            'arusMasuk',
            'arusKeluar',
            'categories',
            'total',
            'total_masuk',
            'total_keluar',
            'user',
            'labaRugi',
            'totalLaba',
            'masuk_labaRugi',
            'keluar_labaRugi',
            'label',
            'userId',
            'tenant',
            'labaBersih',
            'laba_masuk',
            'laba_keluar',
            'laba_bersih',
            'totalLabaBersih',
            'kas_masuk',
            'kas_keluar',
            'pendapatan',
            'saldo_kas',
            'labaMasuk',
            'labaKeluar',
            // 'ArusKasMasuk',
            // 'ArusKasKeluar',
            // 'ArusMasukTotal',
            // 'ArusKeluarTotal'
        ));
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

        return redirect('/tenant/keuangan')->with('success', 'Menambahkan Data Arus Kas');
    }
    public function editArus($id)
    {
        $user = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();

        $k = DB::table('arus_kas')->where('id', $id)->first();
        $tenant = DB::table('tenant')->get();
        $arus = DB::table('arus_kas')->get();
        $users = DB::table('users')->get();
        $keuangan = keuangan::find($id);

        return view('keuangan.arusEdit', compact('k', 'keuangan', 'users', 'tenant', 'arus', 'user'));
    }

    public function updateArus($id, Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'foto' => 'nullable|file|mimes:png,jpeg,jpg,pdf',
        ]);
        $keuangan = Keuangan::find($id);
        $filename = $keuangan->foto;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . Str::slug($request->get('keterangan')) . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = 'img/keuangan';
            $file->move($tujuan_upload, $filename);
            File::delete('img/keuangan/' . $keuangan->foto);
        }
        $keuangan->update([
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'foto' => $filename,
            'tanggal' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('tenant/keuangan')->with(['update' => 'Edit Data Arus Kas']);
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

        return redirect('/tenant/keuangan')->with('successLaba', 'Menambahkan Data Laba Rugi');
    }

    public function editLaba($id)
    {
        $userId = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();

        $b = DB::table('laba_rugi')->where('id', $id)->first();
        $users = DB::table('users')->get();
        $keuangan = keuangan::find($id);

        return view('keuangan.labaEdit', compact('b', 'keuangan', 'users', 'userId'));
    }

    public function updateLaba($id, Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'foto' => 'nullable|file|mimes:png,jpeg,jpg,pdf',
        ]);
        $labaRugi = LabaRugi::find($id);
        $filename = $labaRugi->foto;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . Str::slug($request->get('keterangan')) . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = 'img/keuangan';
            $file->move($tujuan_upload, $filename);
            File::delete('img/keuangan/' . $labaRugi->foto);
        }
        $labaRugi->update([
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'jumlah' => $request->jumlah,
            'foto' => $filename,
            'tanggal' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('tenant/keuangan')->with(['update' => 'Edit Data Laba Rugi']);
    }

    public function hapusLaba($id)
    {

        $file = DB::table('laba_rugi')->where('id', $id)->first();
        File::delete('img/keuangan/' . $file->foto);
        DB::table('laba_rugi')->where('id', $id)->delete();

        return redirect('/tenant/keuangan')->with('delete', 'Menghapus Laba Rugi');
    }
}
