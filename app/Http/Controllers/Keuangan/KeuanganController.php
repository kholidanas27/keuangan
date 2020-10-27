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
    public function indexInkubator()
    {
        $masuk = Keuangan::select(DB::raw("(SELECT SUM(jumlah) AS jumlah FROM arus_kas WHERE jenis='1') as count"))
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "jenis", "asc"))
            ->pluck('count');
        $keluar = Keuangan::select(DB::raw("(SELECT SUM(jumlah) AS jumlah FROM arus_kas WHERE jenis='0') as count"))
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "jenis", "asc"))
            ->pluck('count');
        $keuangan = Keuangan::orderBy('tanggal', 'asc')->whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->get();
        $pendapatan = Keuangan::orderBy('tanggal', 'asc')->get();
        //Menghitung Total
        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($keuangan as $row) {
            if ($row->jenis == '1')
                $total_masuk = $total_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $total_keluar = $total_keluar + $row->jumlah;
        }

        $total = $total_masuk - $total_keluar;

        $kas_masuk = 0;
        $kas_keluar = 0;

        foreach ($pendapatan as $row) {
            if ($row->jenis == '1')
                $kas_masuk = $kas_masuk + $row->jumlah;

            elseif ($row->jenis == '0')
                $kas_keluar = $kas_keluar + $row->jumlah;
        }

        $saldo_kas = $kas_masuk - $kas_keluar;

        return view('keuangan.inkubator.index', compact('keuangan', 'masuk', 'keluar', "total", 'total_masuk', 'total_keluar', 'saldo_kas', 'kas_masuk', 'kas_keluar'));
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
        $label = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        // DATA TABLE ARUS KAS
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

        // DATA TABLE LABA RUGI

        $labaRugi = DB::table('tenant_user')
            ->join('laba_rugi', 'tenant_user.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select('users.id', 'tenant_user.user_id', 'laba_rugi.*')
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereMonth('tanggal', date('m'))
            ->get();

        $grafikLaba = DB::table('tenant_user')
            ->join('laba_rugi', 'tenant_user.tenant_id', '=', 'laba_rugi.tenant_id')
            ->join('users', 'tenant_user.user_id', '=', 'users.id')
            ->select(DB::raw("(SUM(jumlah)) as count"))
            ->where([
                ['user_id', \Auth::user()->id]
            ])
            ->whereYear('tanggal', date('Y'))
            ->groupBy(DB::raw("Month(tanggal)", "asc"))
            ->pluck('count');

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

        return view('keuangan.index', compact(
            'keuangan',
            'grafik',
            'total',
            'total_masuk',
            'total_keluar',
            'user',
            'grafikLaba',
            'labaRugi',
            'totalLaba',
            'masuk_labaRugi',
            'keluar_labaRugi',
            'label',
            'userId'
        ));
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

    public function tambahLaba()
    {
        $user = User::where('users.id', Auth::user()->id)
            ->join('tenant_user', 'users.id', '=', 'tenant_user.user_id')
            ->select('users.*', 'tenant_user.*')
            ->get();

        $title = 'Tambah Data Arus Kas';
        $laba = DB::table('laba_rugi')->get();
        $tenant = DB::table('tenant_user')->get();

        return view('keuangan.index', compact('laba', 'title', 'tenant'));
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
