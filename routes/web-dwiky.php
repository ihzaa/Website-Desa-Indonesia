<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->middleware('auth:admin')->group(function () {
        Route::resource('4dm1n/berita','BeritaController')->names([
            'index'=>'admin_berita_index',
            'create'=>'admin_berita_create',
            'store'=>'admin_berita_store',
            'destroy'=>'admin_berita_destroy',
            'edit'=>'admin_berita_edit',
            'update'=>'admin_berita_update',
        ]);
});
