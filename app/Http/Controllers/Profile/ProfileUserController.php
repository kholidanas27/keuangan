<?php

namespace App\Http\Controllers\Profile;

use DB;
use Auth;
use App\User;
use App\ProfilUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfilRequest;

class ProfileUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilan data profile user yang sedang login
     */

    public function index()
    {
        if (request()->user()->hasRole(['mentor'])) {
            $data['data'] = User::where(['users.id' => Auth::user()->id])->leftJoin('profil_user', ['users.id' => 'profil_user.user_id'])->select('users.id as uid','users.email as email', 'profil_user.*')->first();
            if (!$data['data']->id) {
                request()->session()->now('message', 'Tolong lengkapi data profil anda');
                request()->session()->now('alert-type', 'warning');
            }
        }
        return view('profile.index', $data);
        // return $data;
    }
    /**
     * menampilkan detail profil user lain berdasarkan request()->id
     */
    public function show()
    {
        if (request()->user()->hasRole(['inkubator', 'tenant'])) {
            $data['data'] = User::where(['users.inkubator_id' => Auth::user()->inkubator_id, 'users.id' => request()->id])->join('role_user', ['users.id' => 'role_user.user_id'])->leftJoin('profil_user', ['users.id' => 'profil_user.user_id'])->select('users.id as uid', 'users.email as email', 'profil_user.*')->firstOrFail();
        }
        return view('profile.index', $data);
    }

    public function update(UpdateProfilRequest $request)
    {
        $profil = ProfilUser::where('user_id', Auth::user()->id)->first();
        $tujuan_upload = 'img/mentor/profile/';

        if ($profil->foto) {
            \File::delete($tujuan_upload . $profil->foto);
        }
        
        $file = $request->foto;
        $filename = time() . \Str::slug($request->get('nama')) . '.' . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $filename);

        ProfilUser::updateOrCreate(
            ['user_id'  =>  Auth::user()->id],
            [
                'nama' =>  $request->nama,
                'jenkel' =>  $request->jenkel,
                'kontak' =>  $request->kontak,
                'alamat' =>  $request->alamat,
                'nik' =>  $request->nik,
                'foto' =>  $filename,
                'deskripsi' =>  $request->deskripsi,
                'status' =>  '1',
            ],
        );
        $notification = array(
            'message' => 'Data Profil Berhasil Diperbarui',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
