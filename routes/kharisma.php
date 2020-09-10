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
        Route::get('/form-add', 'KartuKeluargaController@index')->name('data_kk_form_add');
        Route::get('/add', 'KartuKeluargaController@index')->name('data_kk_add');
        Route::get('/form-edit/{id}', 'KartuKeluargaController@index')->name('data_kk_form_edit');
        Route::get('/edit', 'KartuKeluargaController@index')->name('data_kk_edit');
        Route::get('/delete', 'KartuKeluargaController@index')->name('data_kk_delete');
    });
});
