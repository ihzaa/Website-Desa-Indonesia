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

    Route::get('tanyajawab', 'QnAController@index')->name('admin_tanyajawab');
    Route::post('tanyajawab', 'QnAController@store')->name('admin_tanyajawab_post');
    Route::put('tanyajawab/{id}', 'QnAController@update')->name('admin_tanyajawab_update');
    Route::delete('tanyajawab/{id}', 'QnAController@destroy')->name('admin_tanyajawab_delete');

    Route::get('kritiksaran', 'KritikSaranController@index')->name('admin_kritiksaran');
    Route::post('kritiksaran', 'KritikSaranController@store')->name('admin_kritiksaran_post');

    Route::get('pengaturan', 'SettingsController@index')->name('admin_pengaturan');
    Route::put('pengaturan/{id}', 'SettingsController@update')->name('admin_pengaturan_umum_update');
    Route::put('pengaturan/{id}/password', 'SettingsController@updatepassword')->name('admin_pengaturan_password_update');
    Route::post('pengaturan/{id}/kabupaten', 'SettingsController@storekabupatenlogo')->name('admin_pengaturan_logo_kabupaten');
    Route::post('pengaturan/{id}/maskot', 'SettingsController@storemaskotlogo')->name('admin_pengaturan_logo_maskot');
});
