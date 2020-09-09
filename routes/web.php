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

    Route::get('home', 'HomeController@index')->name('admin_home');
    Route::get('home/create', 'HomeController@create')->name('admin_home_create');
    Route::post('home/create', 'HomeController@store')->name('admin_home_post');
    Route::get('home/update/{id}', 'HomeController@edit')->name('admin_home_edit');
    Route::put('home/update/{id}', 'HomeController@update')->name('admin_home_put');
    Route::delete('home/delete/{id}', 'HomeController@destroy')->name('admin_home_destroy');
});
