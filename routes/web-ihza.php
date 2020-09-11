<?php

use Illuminate\Support\Facades\Route;

Route::prefix('4dm1n')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::prefix('surat/permohonan')->group(function () {

        Route::get('/', 'SuratPermohonanController@index')->name('admin_surat_permohonan_index');
        // Route::get('response', 'SuratPermohonanController@indexResponse')->name('admin_surat_permohonan_index_response');

        Route::get('/tambah','SuratPermohonanController@halamanTambah')->name('admin_surat_permohonan_tambah');
        
    });
});
