<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Event;



class EventsController extends Controller
{
    
    public function showEvents(\App\User $user)
    {
       $events=DB::table('events')->where('college',$user->college)->orderBy('created_at','desc')->get();
       return view('events',compact('events'));

    }
    public function showCollegeEvents(\App\C_Admin $c_admin)
    {
       $events=DB::table('events')->where('college',$c_admin->college)->orderBy('created_at','desc')->get();
       return view('events',compact('events'));

    }
    public function addCollegeEvent(\App\C_admin $c_admin)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
        ]);


        //* Create a new user instance after a valid registration.
       $events= Event::create([
            'title' => $data['title'],
            'college' => $c_admin->college,
            'description' => $data['description'],
        ]);
        return redirect()->route('admin_events.show',['c_admin'=>$c_admin]);
    }




     public function showDirectorateEvents(\App\D_Admin $d_admin)
    {
       $events=DB::table('events')->orderBy('created_at','desc')->get();
       return view('events',compact('events'));

    }
    public function addDirectorateEvent(\App\D_admin $d_admin)
    {
        $data = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string',],
        ]);


        //* Create a new user instance after a valid registration.
       $events= Event::create([
            'title' => $data['title'],
            'level' =>  '1',
            'description' => $data['description'],
        ]);
        return redirect()->route('admin_events.show',['d_admin'=>$d_admin]);
    }
}
