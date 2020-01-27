<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class D_admin_ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:d_admin');
    }
    
    public function registered(){
        $d_admin=auth()->user();
        return redirect("/d_admin_profile/{$d_admin->id}");
       }

      public function index(\App\D_admin $d_admin)
    {
        $unverified_c_admin=DB::table('c_admin_profiles')->where([['verified',0],['rejected',0],])->orderBy('c_admin_id','desc')->join('c_admins','c_admin_profiles.c_admin_id','=','c_admins.id')->get();

        return view('d_admin_profiles.index', compact('d_admin','unverified_c_admin'));
    }

    public function edit(\App\D_admin $d_admin)
    {
        $this->authorize('update', $d_admin->d_admin_profile);

        return view('d_admin_profiles.edit', compact('d_admin'));
    }
    
     public function update(\App\D_admin $d_admin)
    {
        $this->authorize('update', $d_admin->d_admin_profile);

        $data = request()->validate([
            'url' => ['sometimes','url',],
            'image' => ['sometimes','image','max:1000',],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('d_admin_profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->d_admin_profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/d_admin_profile/{$d_admin->id}");
    }
}
