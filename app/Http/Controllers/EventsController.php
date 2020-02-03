<?php

namespace App\Http\Controllers;

use App\Event;
use DB;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function showEvents(\App\User $user)
    {
        $this->authorize('view', $user->profile); //if user is verified,then only
        $this->authorize('update', $user->profile); //if user is on his profile,then only

        // $dir=DB::table('events')->where('college',NULL);
        $events = DB::table('events')->where('college', $user->college)->orWhere('college', null)->orderBy('created_at', 'desc')->paginate(20);
        return view('events', compact('events','user'));

    }
    // college event management
    public function showCollegeEvents(\App\C_Admin $c_admin)
    {
        $this->authorize('view', $c_admin->c_admin_profile); //same as above
        $this->authorize('update', $c_admin->c_admin_profile);

        $events = DB::table('events')->where('college', $c_admin->college)->orWhere('college', null)->orderBy('created_at', 'desc')->paginate(20);
        //    dd($events);

        return view('events', compact('events','c_admin'));

    }
    public function addCollegeEvent(\App\C_admin $c_admin)
    {
        $this->authorize('view', $c_admin->c_admin_profile);
        $this->authorize('update', $c_admin->c_admin_profile);

        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        //* Create a new event instance after a valid registration.
        $events = Event::create([
            'title' => $data['title'],
            'level' => 0,
            'college' => auth()->user()->college,
            'description' => $data['description'],
        ]);
        //redirect them to their profile
        return redirect()->route('admin_events.show', ['c_admin' => $c_admin]);
    }

// *************************Directorate event management

    public function showDirectorateEvents(\App\D_Admin $d_admin)
    {
        $events = DB::table('events')->orderBy('created_at', 'desc')->paginate(10);
        return view('events', compact('events','d_admin'));

    }
    public function addDirectorateEvent(\App\D_admin $d_admin)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        //* Create a new event instance after a valid registration.
        $events = Event::create([
            'title' => $data['title'],
            'level' => 1,
            'description' => $data['description'],
        ]);
        return redirect()->route('dir_events.show', ['d_admin' => $d_admin]);
    }
}
