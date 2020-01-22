<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registered(){
        $user= auth()->user();
        // redirect('profiles/{$user}');
        return redirect("/profile/{$user->id}");
       }

      public function index(\App\User $user)
    {

        return view('profiles.index', compact('user'));
    }

    public function edit(\App\User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    
     public function update(\App\User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'url' => ['sometimes','url',],
            'image' => ['sometimes','image','max:1000', 'mimes:jpg,png,gif,webP'],
        ]);


        // if (request('url')) {
        //     $url=request('url')->validate([
        //     'url' => ['sometimes','url',],
        //     ]);
        //     $a=['url'=>$url];
        // }


        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

                // auth()->user()->profile->update($data);

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
            // $a 
        ));

        return redirect("/profile/{$user->id}");
    }

}
