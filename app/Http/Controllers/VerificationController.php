<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:c_admin');
    }
    public function showProfile(\App\C_admin $c_admin,\App\User $user)
    {
        // dd(auth()->user());
        // dd(auth()->user()->is_admin);
        
          $this->authorize('update', $c_admin->c_admin_profile);
          // $this->authorize('view', $c_admin->college);
          if(auth()->user()->college== $user->college)
        return view('profiles.index',compact('user'));
        else return redirect()->back();
    }
    public function verifyProfile(\App\C_admin $c_admin,\App\User $user)
    {
         $this->authorize('update', $c_admin->c_admin_profile);
       $user->profile->update(['verified'=>1]);
       return redirect()->route('c_admin_profile.show',['c_admin'=>$c_admin]);
    }

    public function rejectProfile(\App\C_admin $c_admin,\App\User $user)
    {
         $this->authorize('update', $c_admin->c_admin_profile);
          $data = request()->validate([
            'feedback' => ['sometimes','string','max:255'],
        ]);
        // dd($data);
        $rejected=['rejected'=>1];
       $user->profile->update(array_merge($data,$rejected));
       return redirect()->route('c_admin_profile.show',['c_admin'=>$c_admin]);
    }

}
