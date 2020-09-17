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
Route::prefix('4dm1n')->namespace('Admin')->middleware('auth:admin')->group(function () {
    Route::prefix('kartu-keluarga')->group(function () {
        Route::get('/', 'KartuKeluargaController@index')->name('data_kk_index');
        Route::get('/add', 'KartuKeluargaController@form_add')->name('data_kk_form_add');
        Route::post('/add', 'KartuKeluargaController@store')->name('data_kk_store');
        Route::get('/edit/{id}', 'KartuKeluargaController@form_edit')->name('data_kk_form_edit');
        Route::prefix('/edit/{id}')->group(function () {
            Route::get('/add-anggota', 'PendudukController@form_add')->name('data_penduduk_add');
            Route::post('/add-anggota', 'PendudukController@store')->name('data_penduduk_store');
            Route::get('/edit-anggota/{id_anggota}', 'PendudukController@form_edit')->name('data_penduduk_edit');
            Route::post('/delete', 'PendudukController@delete')->name('data_penduduk_delete');
            Route::post('/update', 'PendudukController@update')->name('data_penduduk_update');
        });
        Route::post('/edit', 'KartuKeluargaController@update')->name('data_kk_update');
        Route::post('/delete', 'KartuKeluargaController@delete')->name('data_kk_delete');
    });

    Route::get('/queryByNama', 'AnggotaPosyanduController@queryByNama')->name('query.penduduk.base');
    Route::get('/queryByNama/{nama}', 'AnggotaPosyanduController@queryByNama');
    Route::post('/anggota/store', 'AnggotaPosyanduController@store')->name('anggota_posyandu_store');
    Route::post('/anggota/delete', 'AnggotaPosyanduController@delete')->name('anggota_posyandu_delete');

    Route::resource('posyandu', 'PosyanduController')->names([
        'index' => 'posyandu.index',
        'store' => 'posyandu.store',
        'edit' => 'posyandu.edit',
        'update' => 'posyandu.update',
        'destroy' => 'posyandu.destroy'
    ]);

});
