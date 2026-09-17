<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('/products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo',function(){
    return 'Halo Dunia, Selama Datang di Pembelajaran Laravel Kelas XII';
});

use App\Http\Controllers\SiswaController;

Route::get('/siswa', [SiswaController::class, 'index'])
    ->name('siswa.index');

Route::get('/siswa/create', [SiswaController::class, 'create'])
    ->name('siswa.create');

Route::post('/siswa', [SiswaController::class, 'store'])
    ->name('siswa.store');

Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])
    ->name('siswa.edit');

Route::put('/siswa/{id}', [SiswaController::class, 'update'])
    ->name('siswa.update');

Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])
    ->name('siswa.destroy');