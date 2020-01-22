<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;


class D_admin_ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:d_admin');
    }
// Auth::guard('d_admin')

    public function registered(){
        // $d_admin= Auth::guard('d_admin')->d_admin();
        $d_admin=auth()->user();
        // dd($d_admin);
        // redirect('d_admin_profiles/{$user}');
        return redirect("/d_admin_profile/{$d_admin->id}");
       }

      public function index(\App\D_admin $d_admin)
    {

        return view('d_admin_profiles.index', compact('d_admin'));
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
            'image' => ['sometimes','image','max:1000', 'mimes:jpg,png,gif,webP'],
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('d_admin_profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // Auth::guard('d_admin')->d_admin()
        auth()->user()->d_admin_profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/d_admin_profile/{$d_admin->id}");
    }
}
