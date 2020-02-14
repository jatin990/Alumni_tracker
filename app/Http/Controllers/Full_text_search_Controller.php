<?php

namespace App\Http\Controllers;

use App\C_admin;
use App\User;
use Illuminate\Http\Request;

class Full_text_search_Controller extends Controller
{
    public function index(\App\C_admin $c_admin)
    {
        return view('full_text_search', compact('c_admin'));
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            $data = User::search($request->get('full_text_search_query'))->join('profiles', 'profiles.user_id', '=', 'users.id')->get();
            return response()->json($data);
        }
    }

    // public function normal_search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = User::latest()->get();
    //         return Datatables::of($data)->make(true);
    //     }

    //     return view('normal_search');
    // }
}
