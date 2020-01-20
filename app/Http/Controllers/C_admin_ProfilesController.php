<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class C_admin_ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:c_admin');
    }

    public function registered(){
        // $c_admin= Auth::guard('c_admin')->c_admin();
        $c_admin=auth()->user();

        // redirect('c_admin_profiles/{$user}');
        return redirect("/c_admin_profile/{$c_admin->id}");
       }

      public function index(\App\C_admin $c_admin)
    {

        return view('c_admin_profiles.index', compact('c_admin'));
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
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('c_admin_profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // Auth::guard('c_admin')->c_admin()
        auth()->user()->c_admin_profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/c_admin_profile/{$c_admin->id}");
    }
}
