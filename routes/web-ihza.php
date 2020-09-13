<?php

use Illuminate\Support\Facades\Route;

Route::prefix('4dm1n')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::prefix('surat/permohonan')->group(function () {
        Route::get('/get/all', 'SuratPermohonanController@getAll')->name('admin_surat_permohonan_get_all');
        Route::get('/', 'SuratPermohonanController@index')->name('admin_surat_permohonan_index');
        Route::get('response', 'SuratPermohonanController@indexResponse')->name('admin_surat_permohonan_index_response');

        Route::get('/tambah', 'SuratPermohonanController@halamanTambah')->name('admin_surat_permohonan_tambah');
        Route::get('/tambah/response', 'SuratPermohonanController@halamanTambahResponse')->name('admin_surat_permohonan_tambah_response');
        Route::post('/tambah/post', 'SuratPermohonanController@tambah')->name('admin_surat_permohonan_tambah_post');

        Route::get('/hapus/{id}', 'SuratPermohonanController@hapus')->name('admin_surat_permohonan_hapus');

        Route::get('{id}', 'SuratPermohonanController@halamanEdit')->name('admin_surat_permohonan_edit');
        Route::get('{id}/response', 'SuratPermohonanController@halamanEditResponse')->name('admin_surat_permohonan_edit_response');
        Route::post('edit/{id}/post', 'SuratPermohonanController@edit')->name('admin_surat_permohonan_edit_post');
    });
});

Route::get('sampel/{id}', 'Admin\SuratPermohonanController@downloadSampel')->name('admin_surat_permohonan_sampel');

