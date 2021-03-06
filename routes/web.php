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

Route::get('/success', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('pages.attend.index');
});

Route::post('/attend', 'AttendController@postScan')->name('attend.post');

// Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@admin')->name('home');
    Route::resource('user', 'UserController');
    Route::resource('employee', 'EmployeeController');
    Route::resource('activity', 'ActivityController');
    Route::resource('attend', 'AttendController');
});


Route::group(['prefix' => 'table'], function () {
    Route::get('/user', 'UserController@dataTable')->name('table.user');
    Route::get('/employee', 'EmployeeController@dataTable')->name('table.employee');
    Route::get('/activity', 'ActivityController@dataTable')->name('table.activity');
    Route::get('/attend', 'AttendController@dataTable')->name('table.attend');
});
