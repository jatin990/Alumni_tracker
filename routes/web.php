<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', 'ProfilesController@registered');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');




Route::prefix('c_admin')->group(function () {
    Route::get('/register', 'Auth\C_adminRegisterController@showregistrationform')->name('c_admin.register');
    Route::post('/register', 'Auth\C_adminRegisterController@register')->name('c_admin.register.submit');
    Route::get('/login', 'Auth\C_adminLoginController@showLoginForm')->name('c_admin.login');
    Route::post('/login', 'Auth\C_adminLoginController@login')->name('c_admin.login.submit');
    Route::get('/', 'C_adminController@index')->name('c_admin.dashboard');
    Route::get('/logout', 'Auth\C_adminLoginController@logout')->name('c_admin.logout');
});



Route::prefix('d_admin')->group(function () {
    Route::get('/login', 'Auth\D_adminLoginController@showLoginForm')->name('d_admin.login');
    Route::post('/login', 'Auth\D_adminLoginController@login')->name('d_admin.login.submit');
    Route::get('/', 'D_adminController@index')->name('d_admin.dashboard');
    Route::get('/logout', 'Auth\D_adminLoginController@logout')->name('d_admin.logout');
});
