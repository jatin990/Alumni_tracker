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
        return view('profiles.index',compact('user',"c_admin" ));
    }
    public function Verify($user)
    {
        
    }
}
