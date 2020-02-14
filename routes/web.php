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

Route::fallback(function () {
    return view('lost');
});

Auth::routes();

// login and registration routes for college admins and directorate admins***************************************************************************

Route::prefix('c_admin')->group(function () {
    Route::get('/register', 'Auth\C_adminRegisterController@showregistrationform')->name('c_admin.register');
    Route::post('/register', 'Auth\C_adminRegisterController@register')->name('c_admin.register.submit');
    Route::get('/login', 'Auth\C_adminLoginController@showLoginForm')->name('c_admin.login');
    Route::post('/login', 'Auth\C_adminLoginController@login')->name('c_admin.login.submit');
    Route::get('/logout', 'Auth\C_adminLoginController@logout')->name('c_admin.logout');
});

Route::prefix('d_admin')->group(function () {
    Route::get('/login', 'Auth\D_adminLoginController@showLoginForm')->name('d_admin.login');
    Route::post('/login', 'Auth\D_adminLoginController@login')->name('d_admin.login.submit');
    Route::get('/logout', 'Auth\D_adminLoginController@logout')->name('d_admin.logout');
});

//profile routes for alumni ***************************************************************************

Route::get('/profile', 'ProfilesController@registered');
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::get('/profile/{user}/connect', 'ProfilesController@connect')->name('profile.connect');
Route::get('/profile/{user}/connect/{other_user}', 'ProfilesController@viewother')->name('profile.connect.view');
Route::patch('/profile/{user}/update', 'ProfilesController@update')->name('profile.update');

//profile routes for college admins ***************************************************************************

Route::prefix('/c_admin_profile/')->group(function () {
    Route::get('/', 'C_admin_ProfilesController@registered')->name('c_admin_profile');
    Route::get('/{c_admin}', 'C_admin_ProfilesController@index')->name('c_admin_profile.show');
    Route::get('/{c_admin}/edit', 'C_admin_ProfilesController@edit')->name('c_admin_profile.edit');
    Route::patch('/{c_admin}/update', 'C_admin_ProfilesController@update')->name('c_admin_profile.update');
});

//profile routes for directorate admins ***************************************************************************

Route::prefix('/d_admin_profile/')->group(function () {
    Route::get('/', 'D_admin_ProfilesController@registered')->name('d_admin_profile');
    Route::get('/{d_admin}', 'D_admin_ProfilesController@index')->name('d_admin_profile.show');
    Route::get('/{d_admin}/edit', 'D_admin_ProfilesController@edit')->name('d_admin_profile.edit');
    Route::patch('/{d_admin}/update', 'D_admin_ProfilesController@update')->name('d_admin_profile.update');
});

//verification***************************************************************************

Route::get('/c_admin_profile/{c_admin}/view/{user}', 'VerificationController@showProfile')->name('profile.to_verify')->middleware('auth:c_admin');
Route::patch('/c_admin_profile/{c_admin}/view/{user}/verify', 'VerificationController@verifyProfile')->name('profile.verify')->middleware('auth:c_admin');
Route::patch('/c_admin_profile/{c_admin}/view/{user}/reject', 'VerificationController@rejectProfile')->name('profile.reject')->middleware('auth:c_admin');

Route::get('/d_admin_profile/{d_admin}/view/{c_admin}', 'VerificationController@showCadminProfile')->name('c_admin_profile.to_verify')->middleware('auth:d_admin');
Route::patch('/d_admin_profile/{d_admin}/view/{c_admin}/verify', 'VerificationController@verifyCadminProfile')->name('c_admin_profile.verify')->middleware('auth:d_admin');
Route::patch('/d_admin_profile/{d_admin}/view/{c_admin}/reject', 'VerificationController@rejectCadminProfile')->name('c_admin_profile.reject')->middleware('auth:d_admin');

//eventscontroller***************************************************************************

Route::get('profile/{user}/events', 'EventsController@showEvents')->name('events.show')->middleware('auth'); //alumni

Route::get('c_admin_profile/{c_admin}/events', 'EventsController@showCollegeEvents')->name('admin_events.show')->middleware('auth:c_admin'); //college admins
Route::patch('c_admin_profile/{c_admin}/add_new_event', 'EventsController@addCollegeEvent')->name('events.add')->middleware('auth:c_admin'); //college admins

Route::get('d_admin_profile/{d_admin}/events', 'EventsController@showDirectorateEvents')->name('dir_events.show')->middleware('auth:d_admin'); //directorate events
Route::patch('d_admin_profile/{d_admin}/add_new_event', 'EventsController@addDirectorateEvent')->name('dir_events.add')->middleware('auth:d_admin'); //directorate events

//noticesController

Route::get('profile/{user}/notices', 'NoticesController@showNotices')->name('notices.show')->middleware('auth'); //alumni

Route::get('c_admin_profile/{c_admin}/notices', 'NoticesController@showCollegeNotices')->name('admin_notices.show')->middleware('auth:c_admin'); //college admins
Route::patch('c_admin_profile/{c_admin}/add_new_notice', 'NoticesController@addCollegeNotice')->name('notices.add')->middleware('auth:c_admin'); //college admins

Route::get('d_admin_profile/{d_admin}/notices', 'NoticesController@showDirectorateNotices')->name('dir_notices.show')->middleware('auth:d_admin'); //directorate notices
Route::patch('d_admin_profile/{d_admin}/add_new_notice', 'NoticesController@addDirectorateNotice')->name('dir_notices.add')->middleware('auth:d_admin'); //directorate notices

//search routes
Route::get('c_admin_profile/{c_admin}/full-text-search', 'Full_text_search_Controller@index')->name('full_text_search.index')->middleware('auth:c_admin');
Route::post('c_admin_profile/{c_admin}/full-text-search/action', 'Full_text_search_Controller@action')->name('full-text-search.action')->middleware('auth:c_admin');
Route::get('d_admin_profile/{d_admin}/full-text-search', 'Full_text_search_Controller@dir_index')->name('dir_full_text_search.index')->middleware('auth:d_admin');
Route::post('d_admin_profile/{d_admin}/full-text-search/action', 'Full_text_search_Controller@dir_action')->name('dir_full-text-search.action')->middleware('auth:d_admin');
