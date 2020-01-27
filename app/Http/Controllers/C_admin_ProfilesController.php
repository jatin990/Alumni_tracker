<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Intervention\Image\Facades\Image;
use DB;

use Illuminate\Http\Request;

class C_admin_ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:c_admin');
    }

    public function registered()
    {
        $c_admin=auth()->user();
        return redirect()->route('c_admin_profile.show',['c_admin'=>$c_admin->id]);
     }

        public function index(\App\C_admin $c_admin)
    {  
//if the admin is verified or if he is on his profile,then only he can visit other admins' profile
        if((auth()->user()->c_admin_profile->verified==1 )||( auth()->user()->c_admin_profile==$c_admin->c_admin_profile)){
        //*****************returns the unverified unrejected alumni */
            // $unverified_alumni=DB::table('profiles')->where([['verified',0],['rejected',0],['college',$c_admin->college],])->orderBy('user_id','desc')->join('users','profiles.user_id','=','users.id')->paginate(6);
            $unverified_alumni=Profile::where([['verified',0],['rejected',0],['college',$c_admin->college],])->orderBy('user_id','desc')->join('users','profiles.user_id','=','users.id')->paginate(6);
        return view('c_admin_profiles.index', compact('c_admin','unverified_alumni'));
        }
        else{
         return $this->authorize('view',$c_admin->c_admin_profile);
        }
        }

    public function edit(\App\C_admin $c_admin)
    {
        $this->authorize('update', $c_admin->c_admin_profile);
        return view('c_admin_profiles.edit', compact('c_admin'));
    }
    
     public function update(\App\C_admin $c_admin)
    { 

        $this->authorize('update', $c_admin->c_admin_profile);

        $data = request()->validate([
            'url' => ['sometimes','url',],
            'image' => ['sometimes','image','max:1500',],
        ]);
        //every time a admin edits his profile, set rejected to 0 so that the directorate can verify him(if unverified) even after rejecting him first
        $rejected=['rejected'=>0];

        if (request('image')) {
            $imagePath = request('image')->store('c_admin_profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->c_admin_profile->update(array_merge(
            $data,
            $imageArray ?? [],
            $rejected,
        ));

        return redirect("/c_admin_profile/{$c_admin->id}");
    }
}
