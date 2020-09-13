<?php

use Illuminate\Support\Facades\Route;

Route::prefix('4dm1n')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin_dashboard');

    Route::prefix('home')->group(function () {
        Route::get('infodesa', 'HomeController@index')->name('admin_home_infodesa');
        Route::get('infodesa/create', 'HomeController@create')->name('admin_home_infodesa_create');
        Route::post('infodesa/create', 'HomeController@store')->name('admin_home_infodesa_post');
        Route::get('infodesa/update/{id}', 'HomeController@edit')->name('admin_home_infodesa_edit');
        Route::put('infodesa/update/{id}', 'HomeController@update')->name('admin_home_infodesa_put');
        Route::delete('infodesa/delete/{id}', 'HomeController@destroy')->name('admin_home_infodesa_destroy');

        Route::get('perangkatdesa', 'PerangkatDesaController@index')->name('admin_home_perangkatdesa');
        Route::post('perangkatdesa/store', 'PerangkatDesaController@store')->name('admin_home_perangkatdesa_post');
        Route::put('perangkatdesa/update/{id}', 'PerangkatDesaController@update')->name('admin_home_perangkatdesa_update');
        Route::delete('perangkatdesa/delete/{id}', 'PerangkatDesaController@destroy')->name('admin_home_perangkatdesa_destroy');

        Route::get('bpd', 'BPDController@index')->name('admin_home_bpd');
        Route::post('bpd/store', 'BPDController@store')->name('admin_home_bpd_post');
        Route::put('bpd/update/{id}', 'BPDController@update')->name('admin_home_bpd_update');
        Route::delete('bpd/delete/{id}', 'BPDController@destroy')->name('admin_home_bpd_destroy');
    });
});
