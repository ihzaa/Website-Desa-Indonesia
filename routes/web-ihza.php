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

        Route::get('sampel/{id}', 'SuratPermohonanController@downloadSampel')->name('admin_surat_permohonan_sampel');
        Route::get('sampel/new/{id}', 'SuratPermohonanController@downloadSampelNew')->name('admin_surat_permohonan_sampel_new');

        Route::get('arsip/all', 'SuratPermohonanController@getAllArsip')->name('admin_surat_permohonan_get_all_arsip');
        Route::get('download/arsip/{id}', 'SuratPermohonanController@downloadArsipById')->name('admin_surat_permohonan_download_arsip');
    });
    Route::name('admin_surat_pengantar_pindah_')->prefix('surat/pengantar-pindah')->group(function () {
        Route::get('/', 'SuratPengantarPindahController@index')->name('index');
    });
});


Route::prefix('surat-permohonan')->namespace('Front')->group(function () {
    Route::get('', 'SuratPermohonanController@index')->name('front_index_surat_permohonan');
    Route::post('login', 'SuratPermohonanController@login')->name('front_surat_permohonan_login_post');
    Route::get('logout', 'SuratPermohonanController@logout')->name('front_surat_permohonan_logout');
    Route::get('unduh/{id}', 'SuratPermohonanController@unduh')->name('front_surat_permohonan_unduh');
    Route::get('pindah/{id}/prov', 'SuratPermohonanController@getDataWilayah')->name('front_surat_permohonan_pindah_get_prov');
    Route::get('pindah/{id}/kota', 'SuratPermohonanController@getKota')->name('front_surat_permohonan_pindah_get_kota');
    Route::post('unduh/pindah', 'SuratPermohonanController@unduhSuratKeluar')->name('front_surat_permohonan_pindah_unduh');
});
