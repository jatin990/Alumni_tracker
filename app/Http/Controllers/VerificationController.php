<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{

  
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

//admin verification
    public function showcAdminProfile(\App\D_admin $d_admin,\App\C_admin $c_admin)
    {
        
          // $this->authorize('update', $d_admin->d_admin_profile);
          
        return view('c_admin_profiles.index',compact('c_admin'));
    }
    public function verifycAdminProfile(\App\D_admin $d_admin,\App\C_admin $c_admin)
    {
        //  $this->authorize('update', $d_admin->d_admin_profile);
       $c_admin->c_admin_profile->update(['verified'=>1]);
       return redirect()->route('d_admin_profile.show',['d_admin'=>$d_admin]);
    }

    public function rejectcAdminProfile(\App\D_admin $d_admin,\App\C_admin $c_admin)
    {
        //  $this->authorize('update', $d_admin->d_admin_profile);
          $data = request()->validate([
            'feedback' => ['sometimes','string','max:255'],
        ]);
        // dd($data);
        $rejected=['rejected'=>1];
       $c_admin->c_admin_profile->update(array_merge($data,$rejected));
       return redirect()->route('d_admin_profile.show',['d_admin'=>$d_admin]);
    }

}
