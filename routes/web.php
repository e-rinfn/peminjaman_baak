<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PinjamBarangController;
use App\Http\Controllers\PinjamRuanganController;

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [AuthController::class, 'login'])->name('login'); // fungsi login
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function () {
    Route::post('/logout', [AuthController::class, 'logout']); // fungsi logout
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () { // check role ketika login ini adalah role admin atau role 1
    Route::get('/admin', [AdminController::class, 'index']); // route index halaman admin

    // Barang
    Route::get('/pinjam-barang', [PinjamBarangController::class, 'tampilPinjamBarang']); // route index halaman admin
    Route::get('/daftar-barang', [AdminController::class, 'daftarBarang']); // route untuk menuju halaman daftar barang
    Route::get('/daftar-barang', [BarangController::class, 'tampilBarangAdmin']); // untuk tampilan barang 
    Route::post('/daftar-barang', [BarangController::class, 'store']); // route tambah barang
    Route::get('/daftar-barang/{id}/edit', [BarangController::class, 'edit']); // route edit barang
    Route::put('/daftar-barang/{id}', [BarangController::class, 'update']); // route update barang
    Route::delete('/daftar-barang/{id}', [BarangController::class, 'destroy']); // route delete barang
    Route::get('/lihat-pinjam-barang-admin/{pinjamBarang}/edit', [PinjamBarangController::class, 'lihatPinjamBarangAdmin']); // halaman untuk melihat detail pinjam barang
    Route::put('/lihat-pinjam-barang-admin/{pinjamBarang}', [PinjamBarangController::class, 'update']); // route update barang

    // Ruangan
    Route::get('/pinjam-ruangan', [PinjamRuanganController::class, 'tampilPinjamRuangan']); // route index halaman admin
    Route::get('/daftar-ruangan', [AdminController::class, 'daftarRuangan']); // route untuk menuju halaman daftar ruangan
    Route::get('/daftar-ruangan', [RuanganController::class, 'tampilRuanganAdmin']); // untuk tampilan ruangan 
    Route::post('/daftar-ruangan', [RuanganController::class, 'store']); // route tambah ruangan
    Route::get('/daftar-ruangan/{id}/edit', [RuanganController::class, 'edit']); // route edit ruangan
    Route::put('/daftar-ruangan/{id}', [RuanganController::class, 'update']); // route update ruangan
    Route::delete('/daftar-ruangan/{id}', [RuanganController::class, 'destroy']); // route delete ruangan
    Route::get('/lihat-pinjam-ruangan-admin/{pinjamRuangan}/edit', [PinjamRuanganController::class, 'lihatPinjamRuanganAdmin']); // halaman untuk melihat detail pinjam ruangan
    Route::put('/lihat-pinjam-ruangan-admin/{pinjamRuangan}', [PinjamRuanganController::class, 'update']); // route update ruangan
});

// untuk pimpinan
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/pimpinan', [PimpinanController::class, 'index']);
});

// untuk mahasiswa
Route::group(['middleware' => ['auth', 'checkrole:3']], function () { // check role ketika login ini adalah role mahasiswa atau role 3
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']); // route index halaman mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'daftarBentrokBarangMahasiswa']); // route index halaman mahasiswa

    // barang
    Route::get('/daftar-barang-mahasiswa', [MahasiswaController::class, 'daftarBarang']); // halaman daftar barang pada halaman mahasiswa
    Route::get('/daftar-barang-mahasiswa', [BarangController::class, 'tampilBarangMahasiswa']); // route untuk menampilkan data barang pada halaman mahasiswa
    Route::get('/tambah-pinjam-barang', [BarangController::class, 'tambahPinjamBarang']); // route untuk menampilkan data peminjaman barang mahasiswa
    Route::get('/tambah-pinjam-barang', [MahasiswaController::class, 'tambahPinjamBarang']); // route untuk menampilkan halaman tambah pinjam barang
    Route::post('/tambah-pinjam-barang', [PinjamBarangController::class, 'store']); // route yang berfungsi untuk menambahkan data ke tabel pinjam barang
    Route::get('/daftar-pinjam-barang-mahasiswa', [MahasiswaController::class, 'daftarPinjamBarangMahasiswa']); // route untuk menampilkan halaman daftar pinjam barang
    Route::get('/daftar-pinjam-barang-mahasiswa', [PinjamBarangController::class, 'tampilPinjamBarangMahasiswa']); // untuk memanggil data dari tabel pinjam barang
    Route::get('/lihat-pinjam-barang-mahasiswa/{pinjamBarang}/edit', [PinjamBarangController::class, 'lihatPinjamBarangMahasiswa']); // halaman untuk melihat hasil dari peminjaman yang dilakukan

    // ruangan
    Route::get('/daftar-ruangan-mahasiswa', [MahasiswaController::class, 'daftarRuangan']); // halaman daftar ruangan pada halaman mahasiswa
    Route::get('/daftar-ruangan-mahasiswa', [RuanganController::class, 'tampilRuanganMahasiswa']); // route untuk menampilkan data ruangan pada halaman mahasiswa
    Route::get('/tambah-pinjam-ruangan', [RuanganController::class, 'tambahPinjamRuangan']); // route untuk menampilkan data peminjaman ruangan mahasiswa
    Route::get('/tambah-pinjam-ruangan', [MahasiswaController::class, 'tambahPinjamRuangan']); // route untuk menampilkan halaman tambah pinjam ruangan
    Route::post('/tambah-pinjam-ruangan', [PinjamRuanganController::class, 'store']); // route yang berfungsi untuk menambahkan data ke tabel pinjam ruangan
    Route::get('/daftar-pinjam-ruangan-mahasiswa', [MahasiswaController::class, 'daftarPinjamRuanganMahasiswa']); // route untuk menampilkan halaman daftar pinjam barang
    Route::get('/daftar-pinjam-ruangan-mahasiswa', [PinjamRuanganController::class, 'tampilPinjamRuanganMahasiswa']); // untuk memanggil data dari tabel pinjam barang
    Route::get('/lihat-pinjam-ruangan-mahasiswa/{pinjamRuangan}/edit', [PinjamRuanganController::class, 'lihatPinjamRuanganMahasiswa']); // halaman untuk melihat hasil dari peminjaman yang dilakukan
});