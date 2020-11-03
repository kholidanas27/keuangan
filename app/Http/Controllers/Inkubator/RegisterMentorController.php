<?php

namespace App\Http\Controllers\Inkubator;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterMentorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:inkubator']);
    }

    protected function create()
    {
        request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = config('roles.models.defaultUser')::create([
            'name' => request('email'),
            'inkubator_id' => Auth::user()->inkubator_id,
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $role = config('roles.models.role')::where('name', '=', 'Mentor')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        $notification = array(
            'message' => 'User Berhasil Ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
