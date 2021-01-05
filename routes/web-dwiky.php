<?php

use Illuminate\Support\Facades\Route;

Route::namespace ('Admin')->middleware('auth:admin')->group(function () {
    Route::resource('4dm1n/berita', 'BeritaController')->names([
        'index' => 'admin_berita_index',
        'create' => 'admin_berita_create',
        'store' => 'admin_berita_store',
        'destroy' => 'admin_berita_destroy',
        'edit' => 'admin_berita_edit',
        'update' => 'admin_berita_update',
    ]);

    Route::resource('4dm1n/transparansi', 'TransparansiController')->names([
        'index' => 'admin_transparansi_index',
        'create' => 'admin_transparansi_create',
        'store' => 'admin_transparansi_store',
        'destroy' => 'admin_transparansi_destroy',
        'edit' => 'admin_transparansi_edit',
        'update' => 'admin_transparansi_update',
    ]);

    Route::post('4dm1n/transparansi/switch/{id}', 'TransparansiController@SwitchToggle')->name('admin_transparansi_toggle');

    Route::prefix('4dm1n/transparansi/kelola/{id}')->group(function () {
        Route::get('', 'TransparansiController@KelolaTransparansi')->name('admin_kelola_transparansi');
        Route::prefix('pendapatan')->group(function(){
            Route::post('store', 'TransparansiController@StorePendapatan')->name('admin_kelola_transparansi_store_pendapatan');
            Route::put('update', 'TransparansiController@UpdatePendapatan')->name('admin_kelola_transparansi_update_pendapatan');
            Route::delete('destroy', 'TransparansiController@DestroyPendapatan')->name('admin_kelola_transparansi_destroy_pendapatan');
        });
        Route::prefix('pembiayaan')->group(function(){
            Route::post('store', 'TransparansiController@StorePembiayaan')->name('admin_kelola_transparansi_store_pembiayaan');
            Route::put('update', 'TransparansiController@UpdatePembiayaan')->name('admin_kelola_transparansi_update_pembiayaan');
            Route::delete('destroy', 'TransparansiController@DestroyPembiayaan')->name('admin_kelola_transparansi_destroy_pembiayaan');
        });
        Route::prefix('belanja')->group(function(){
            Route::post('store', 'TransparansiController@StoreBelanja')->name('admin_kelola_transparansi_store_belanja');
            Route::put('update', 'TransparansiController@UpdateBelanja')->name('admin_kelola_transparansi_update_belanja');
            Route::delete('destroy', 'TransparansiController@DestroyBelanja')->name('admin_kelola_transparansi_destroy_belanja');
        });
    });

    Route::prefix('4dm1n/arsip-dokumen')->group(function(){
        
    });

    Route::prefix('4dm1n/arsip-dokumen')->group(function(){
        
    });
});
