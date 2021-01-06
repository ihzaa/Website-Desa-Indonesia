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

    Route::resource('4dm1n/arsip-dokumen', 'TahunArsipDokumenController')->names([
        'index' => 'admin_arsip_dokumen_index',
        'store' => 'admin_arsip_dokumen_store',
        'destroy' => 'admin_arsip_dokumen_destroy',
        'update' => 'admin_arsip_dokumen_update',
    ]);
    
    Route::resource('4dm1n/arsip-keuangan', 'TahunArsipKeuanganController')->names([
        'index' => 'admin_arsip_keuangan_index',
        'store' => 'admin_arsip_keuangan_store',
        'destroy' => 'admin_arsip_keuangan_destroy',
        'update' => 'admin_arsip_keuangan_update',
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

    Route::prefix('4dm1n/arsip-dokumen/{id}/kelola')->group(function(){
        Route::get('/','ArsipDokumenController@index')->name('admin_arsip_dokumen_kelola_index');
        Route::post('/','ArsipDokumenController@store')->name('admin_arsip_dokumen_kelola_store');
        Route::delete('/{idArsip}','ArsipDokumenController@destroy')->name('admin_arsip_dokumen_kelola_destroy');
        Route::put('/{idArsip}','ArsipDokumenController@update')->name('admin_arsip_dokumen_kelola_update');
    });

    Route::prefix('4dm1n/arsip-keuangan/{id}/kelola')->group(function(){
        Route::get('/','ArsipKeuanganController@index')->name('admin_arsip_keuangan_kelola_index');
        
        Route::post('pendapatan/','PendapatanArsipController@store')->name('admin_arsip_keuangan_kelola_pendapatan_store');
        Route::put('pendapatan/{idArsip}','PendapatanArsipController@update')->name('admin_arsip_keuangan_kelola_pendapatan_destroy');
        Route::delete('pendapatan/{idArsip}','PendapatanArsipController@destroy')->name('admin_arsip_keuangan_kelola_pendapatan_update');

        Route::post('bidang/','BidangArsipController@store')->name('admin_arsip_keuangan_kelola_bidang_store');
        Route::put('bidang/{idArsip}','BidangArsipController@update')->name('admin_arsip_keuangan_kelola_bidang_destroy');
        Route::delete('bidang/{idArsip}','BidangArsipController@destroy')->name('admin_arsip_keuangan_kelola_bidang_update');

        Route::post('pos/','PosArsipController@store')->name('admin_arsip_keuangan_kelola_pos_store');
        Route::put('pos/{idArsip}','PosArsipController@update')->name('admin_arsip_keuangan_kelola_pos_destroy');
        Route::delete('pos/{idArsip}','PosArsipController@destroy')->name('admin_arsip_keuangan_kelola_pos_update');

        Route::prefix('{idBidang}')->group(function(){
            Route::get('/', 'RincianArsipKeuanganController@index')->name('admin_arsip_keuangan_kelola_rincian_index');
            Route::post('/', 'RincianArsipKeuanganController@store')->name('admin_arsip_keuangan_kelola_rincian_store');
            Route::put('/{idRincian}', 'RincianArsipKeuanganController@update')->name('admin_arsip_keuangan_kelola_rincian_update');
            Route::delete('/{idRincian}', 'RincianArsipKeuanganController@destroy')->name('admin_arsip_keuangan_kelola_rincian_destroy');
        });
    });
});
