<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\C_admin;
use Illuminate\Support\Facades\Auth;


class C_adminLogInController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:c_admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.C_admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

         Auth::guard('web')->logout();
         Auth::guard('d_admin')->logout();
        // Attempt to log the user in
        if (Auth::guard('c_admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('c_admin_profile'));
        }
        
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

      

    public function logout()
    {
        Auth::guard('c_admin')->logout();
        return redirect('/');
    }

    
}
