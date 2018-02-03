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

Route::group(['middleware' => ['auth'], 'prefix' => 'settings'], function () {
    Route::any('/settings/edit/users/profile/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_user_profile'])->name('settings.edit.user.profile');
    Route::any('/settings/edit/users/password/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_user_password'])->name('settings.edit.user.password');
    Route::any('/settings/edit/task/priority/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_task_priority'])->name('settings.edit.task.priority');
    Route::any('/settings/edit/task/category/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_task_category'])->name('settings.edit.task.category');
    Route::any('/settings/edit/reminder/type/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_reminder_type'])->name('settings.edit.reminder.type');
    Route::any('/settings/edit/user/dept/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_user_department'])->name('settings.edit.user.department');
    //Route::any('/settings/edit/user/pwd/{id}', ['nocsrf' => TRUE,'uses' => 'SettingsController@edit_user_password'])->name('settings.edit.user.pwd');

    Route::any('/settings/add/user/dept', ['nocsrf' => TRUE,'uses' => 'SettingsController@create_user_department'])->name('settings.add.user.department');
    Route::any('/settings/add/reminder/type', ['nocsrf' => TRUE,'uses' => 'SettingsController@create_reminder_type'])->name('settings.add.reminder.type');
    Route::any('/settings/add/task/category', ['nocsrf' => TRUE,'uses' => 'SettingsController@create_task_category'])->name('settings.add.task.category');
    Route::any('/settings/add/task/priority', ['nocsrf' => TRUE,'uses' => 'SettingsController@create_task_priority'])->name('settings.add.task.priority');
    Route::any('/settings/add/user/profile', ['nocsrf' => TRUE,'uses' => 'SettingsController@create_user'])->name('settings.add.user.profile');
});

Route::group(['middleware' => ['auth','manager'], 'prefix' => 'manager'], function () {
    Route::any('/home', 'ManagerController@index')->name('manager.home');
    Route::any('/settings', 'ManagerController@settings')->name('manager.settings');
    Route::any('/settings/list/users', ['nocsrf' => TRUE,'uses' => 'ManagerController@listUsers'])->name('manager.list.users');
    Route::any('/settings/list/tasks-priority', ['nocsrf' => TRUE,'uses' => 'ManagerController@listTaskPriority'])->name('manager.list.task.priority');
    Route::any('/settings/list/tasks-category', ['nocsrf' => TRUE,'uses' => 'ManagerController@listTaskCategory'])->name('manager.list.task.category');
    Route::any('/settings/list/reminder-types', ['nocsrf' => TRUE,'uses' => 'ManagerController@listReminderTypes'])->name('manager.list.task.reminder.types');
    Route::any('/settings/list/user-dept', ['nocsrf' => TRUE,'uses' => 'ManagerController@listUserDepartments'])->name('manager.list.user.departments');

});

// normal user account urls
Route::group(['middleware' => ['auth','member'], 'prefix' => 'staff'], function () {
    Route::any('/home', 'StaffController@index')->name('staff.home');
    Route::any('/tasks', 'StaffController@MyTasks')->name('staff.tasks');

});