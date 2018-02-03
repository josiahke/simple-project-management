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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::group(['middleware' => ['auth','manager'], 'prefix' => 'manager'], function () {
    Route::any('/home', 'ManagerController@index')->name('manager.home');
    Route::any('/settings', 'ManagerController@settings')->name('manager.settings');
});

// normal user account urls
Route::group(['middleware' => ['auth','member'], 'prefix' => 'staff'], function () {
    Route::any('/home', 'StaffController@index')->name('staff.home');
    Route::any('/tasks', 'StaffController@MyTasks')->name('staff.tasks');
});