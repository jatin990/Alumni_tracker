<?php

namespace App\Http\Controllers\Auth;

use App\C_admin;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class C_adminRegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:c_admin');
    }

    protected function guard()
    {
        return Auth::guard('c_admins');
    }

    public function showregistrationform()
    {

        return view('auth.C_admin-register');

    }

    public function register()
    {
        // Get a validator for an incoming registration request
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:c_admins'],
            'college' => ['required', 'string'],
            // 'phone_no' => ['required', 'numeric','digits:10' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //* Create a new user instance after a valid registration.
        $c_admin = C_admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'college' => $data['college'],
            // 'phone_no' => $data['phone_no'],
            'password' => Hash::make($data['password']),
        ]);
        Auth::guard('web')->logout();
        Auth::guard('d_admin')->logout();
        //log user in
        $credentials = ['email' => request()->email, 'password' => request()->password];
        Auth::guard('c_admin')->attempt($credentials);
        return redirect()->intended(route('c_admin_profile'));
    }
}
