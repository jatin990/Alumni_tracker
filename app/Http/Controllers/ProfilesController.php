<?php

namespace App\Http\Controllers;
use DB;
use Auth;
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
        Auth::guard('c_admin')->logout();
         Auth::guard('d_admin')->logout();
        return redirect("/profile/{$user->id}");
       }

      public function index(\App\User $user)
    {
        if((auth()->user()->profile->verified==1 )||( auth()->user()->profile==$user->profile))
        return view('profiles.index', compact('user'));
        else return $this->authorize('view', $user->profile);
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
            'image' => ['sometimes','image','max:1500',],
        ]);


        // if (request('url')) {
        //     $url=request('url')->validate([
        //     'url' => ['sometimes','url',],
        //     ]);
        //     $a=['url'=>$url];
        // }
        $rejected=['rejected'=>0];

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
            $rejected,
        ));

        return redirect("/profile/{$user->id}");
    }

    public function connect(\App\User $user)
    {
        $this->authorize('view', $user->profile);
        $this->authorize('update', $user->profile);

        $connections=DB::table('profiles')->where([['college',$user->college],['verified',1]])->orderBy('user_id','desc')->join('users','profiles.user_id','=','users.id')->get();
        return view('profiles.connections', compact('user','connections'));

    }
    public function viewother(\App\User $user , \App\User $other_user)
    {
        $this->authorize('view', $user->profile);
        $this->authorize('update', $user->profile);
        $user=$other_user;
          if(auth()->user()->college== $user->college)
        return view('profiles.index',compact('user'));
        else return redirect()->back();
    }

}
