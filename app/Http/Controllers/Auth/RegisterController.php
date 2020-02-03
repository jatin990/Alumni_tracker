<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Providers\RouteServiceProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'college' => ['required', 'string', 'max:255'],
            'branch' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'digits:10'],
            'dateOfBirth' => ['required'],
            'year' => ['required', 'numeric', 'between:2011,2019'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Mail::to($data['email'])->send(new WelcomeMail());
        Auth::guard('web')->logout();
        Auth::guard('c_admin')->logout();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'college' => $data['college'],
            'branch' => $data['branch'],
            'dateOfBirth' => $data['dateOfBirth'],
            'phone_no' => $data['phone_no'],
            'year' => $data['year'],
            'password' => Hash::make($data['password']),
        ]);

    }
}
