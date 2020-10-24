<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\ProfilUser;
use App\User;
use DB;

class ProfileUserController extends Controller
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
		$data['data']=User::where(['users.inkubator_id'=>Auth::user()->inkubator_id,'users.id'=>3])->join('role_user',['users.id'=>'role_user.user_id'])->leftJoin('profil_user',['users.id'=>'profil_user.user_id'])->select('users.id as uid','profil_user.*')->first();
        return view('profile.index',$data);
		// return $data;
    }
}
