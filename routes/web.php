<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PimpinanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index']); // route index halaman admin
    Route::get('/admin', [BarangController::class, 'index']); // route index barang
    Route::get('/admin/create', [BarangController::class, 'create']); // route untuk menambahkan barang
    Route::resource('barang', BarangController::class);
});

// untuk pimpinan
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/pimpinan', [PimpinanController::class, 'index']);
});

// untuk mahasiswa
Route::group(['middleware' => ['auth', 'checkrole:3']], function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
});