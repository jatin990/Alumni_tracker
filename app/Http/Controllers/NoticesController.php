<?php

namespace App\Http\Controllers;

use App\Notice;
use DB;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function showNotices(\App\User $user)
    {
        $this->authorize('view', $user->profile); //if user is verified,then only
        $this->authorize('update', $user->profile); //if user is on his profile,then only

        // $dir=DB::table('notices')->where('college',NULL);
        $notices = DB::table('notices')->where('college', $user->college)->orWhere('college', null)->orderBy('created_at', 'desc')->paginate(20);
        return view('notices', compact('notices', 'user'));

    }
    // college event management
    public function showCollegeNotices(\App\C_Admin $c_admin)
    {
        $this->authorize('view', $c_admin->c_admin_profile); //same as above
        $this->authorize('update', $c_admin->c_admin_profile);

        $notices = DB::table('notices')->where('college', $c_admin->college)->orWhere('college', null)->orderBy('created_at', 'desc')->paginate(20);
        //    dd($notices);

        return view('notices', compact('notices', 'c_admin'));

    }
    public function addCollegeNotice(\App\C_admin $c_admin)
    {
        $this->authorize('view', $c_admin->c_admin_profile);
        $this->authorize('update', $c_admin->c_admin_profile);

        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        //* Create a new event instance after a valid registration.
        $notices = Notice::create([
            'title' => $data['title'],
            'level' => 0,
            'college' => auth()->user()->college,
        ]);
        //redirect them to their profile
        return redirect()->route('admin_notices.show', ['c_admin' => $c_admin]);
    }

// *************************Directorate event management

    public function showDirectorateNotices(\App\D_Admin $d_admin)
    {
        $notices = DB::table('notices')->orderBy('created_at', 'desc')->paginate(10);
        return view('notices', compact('notices', 'd_admin'));

    }
    public function addDirectorateNotice(\App\D_admin $d_admin)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        //* Create a new event instance after a valid registration.
        $notices = Notice::create([
            'title' => $data['title'],
            'level' => 1,
        ]);
        return redirect()->route('dir_notices.show', ['d_admin' => $d_admin]);
    }
}
