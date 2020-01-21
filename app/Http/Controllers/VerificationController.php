<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:c_admin');
    }
    public function showProfile($c_admin,\App\User $user)
    {
        // dd(auth()->user());
        // dd(auth()->user()->is_admin);
        return view('profiles.index',compact('user' ));
    }
    public function verifyProfile(\App\C_admin $c_admin,\App\User $user)
    {
       $user->profile->update(['verified'=>1]);
       return redirect()->route('c_admin_profile.show',['c_admin'=>$c_admin]);
    }
}
