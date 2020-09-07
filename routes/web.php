<?php

use Illuminate\Support\Facades\Route;

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

//Auth admin
Route::get('4dm1n/login', 'Admin\Auth\AuthController@loginGet')->name('admin_login_get')->middleware('guest');
Route::post('4dm1n/login', 'Admin\Auth\AuthController@loginPost')->name('admin_login_post')->middleware('guest');
Route::get('4dm1n/logout', 'Admin\Auth\AuthController@logout')->name('admin_logout');

//MIDDLEWARE YG DIPAKE AUTH:ADMIN DISINI
Route::prefix('4dm1n')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin_dashboard');
});
