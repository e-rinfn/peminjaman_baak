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
use App\Http\Controllers\RegistrasiController;

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
Route::group(['middleware' => ['auth', 'checkrole:1']], function () { // jika role = 1 maka user tersebut adalah admin
    Route::get('/admin', [AdminController::class, 'index']); // menampilkan halaman admin

    // Barang
    Route::get('/pinjam-barang', [PinjamBarangController::class, 'tampilPinjamBarang']); // menampilkan list barang dipinjam
    Route::get('/daftar-barang', [AdminController::class, 'daftarBarang']); // halaman daftar barang
    Route::get('/daftar-barang', [BarangController::class, 'tampilBarangAdmin']); // menampilkan daftar barang 
    Route::post('/daftar-barang', [BarangController::class, 'store']); // menambahkan data barang
    Route::get('/daftar-barang/{id}/edit', [BarangController::class, 'edit']); // menampilkan halaman edit data barang
    Route::put('/daftar-barang/{id}', [BarangController::class, 'update']); // update data barang yang diedit
    Route::delete('/daftar-barang/{id}', [BarangController::class, 'destroy']); // menghapus data barang
    Route::get('/lihat-pinjam-barang-admin/{pinjamBarang}/edit', [PinjamBarangController::class, 'lihatPinjamBarangAdmin']); // melihat detail pinjam barang
    Route::put('/lihat-pinjam-barang-admin/{pinjamBarang}', [PinjamBarangController::class, 'update']); // cek dan acc peminjaman barang

    // Ruangan
    Route::get('/pinjam-ruangan', [PinjamRuanganController::class, 'tampilPinjamRuangan']); // menampilkan list ruangan dipinjam
    Route::get('/daftar-ruangan', [AdminController::class, 'daftarRuangan']); // halaman daftar ruangan
    Route::get('/daftar-ruangan', [RuanganController::class, 'tampilRuanganAdmin']); // menampilkan daftar ruangan
    Route::post('/daftar-ruangan', [RuanganController::class, 'store']); // menambahkan data ruangan
    Route::get('/daftar-ruangan/{id}/edit', [RuanganController::class, 'edit']); // menampilkan halaman edit data ruangan
    Route::put('/daftar-ruangan/{id}', [RuanganController::class, 'update']); // update data ruangan yang diedit
    Route::delete('/daftar-ruangan/{id}', [RuanganController::class, 'destroy']); // manhapus data ruangan
    Route::get('/lihat-pinjam-ruangan-admin/{pinjamRuangan}/edit', [PinjamRuanganController::class, 'lihatPinjamRuanganAdmin']);  // melihat detail pinjam ruangan
    Route::put('/lihat-pinjam-ruangan-admin/{pinjamRuangan}', [PinjamRuanganController::class, 'update']); // cek dan acc peminjaman ruangan




    // Laporan

    // Laporan Barang
    Route::get('/laporan', [AdminController::class, 'laporanPeminjaman']);
    Route::get('/laporan', [PinjamBarangController::class, 'laporanPinjamBarang']);

    // Filter Halaman Laporan Peminjaman Barang
    Route::get('/filter-by-date', [PinjamBarangController::class, 'filterByDate'])->name('filter.by.date');
    Route::get('/reset-filter', [PinjamBarangController::class, 'resetFilter'])->name('reset.filter');

    // Laporan ruangan
    Route::get('/laporan-ruangan', [AdminController::class, 'laporanPeminjamanRuangan']);
    Route::get('/laporan-ruangan', [PinjamRuanganController::class, 'laporanPinjamRuangan']);

    // Filter Halaman Laporan Peminjaman Barang
    Route::get('/filter-by-date-ruangan', [PinjamRuanganController::class, 'filterByDate']);
    Route::get('/reset-filter-ruangan', [PinjamRuanganController::class, 'resetFilter']);


    // Akun
    Route::get('/akun', [AdminController::class, 'akun']); // menampilkan halaman akun
    Route::get('/akun', [AuthController::class, 'tampilUserAdmin']); // menampilkan daftar pengguna 
    Route::post('/akun', [AuthController::class, 'register']); // tambah pengguna

    Route::get('/akun', [AuthController::class, 'tampilUserAdmin']);
    Route::get('/edit-akun/{id}', [AuthController::class, 'editUser']); // menuju ke halaman edit akun 
    Route::put('/edit-akun/{id}', [AuthController::class, 'updateUser']); // ubah akun pengguna
    Route::delete('/akun/{id}', [AuthController::class, 'deleteUser']); // hapus akun pengguna

});

// untuk pimpinan
Route::group(['middleware' => ['auth', 'checkrole:2']], function () { // jika role = 2 maka user tersebut adalah pimpinan
    Route::get('/pimpinan', [PimpinanController::class, 'index']);
});

// untuk mahasiswa
Route::group(['middleware' => ['auth', 'checkrole:3']], function () { // jika role = 3 maka user tersebut adalah mahasiswa

    // index
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']); // menampilkan halaman utama mahasiswa

    // barang
    Route::get('/daftar-barang-mahasiswa', [MahasiswaController::class, 'daftarBarang']); // halaman daftar barang mahasiswa
    Route::get('/daftar-barang-mahasiswa', [BarangController::class, 'tampilBarangMahasiswa']); // menampilkan data barang pada halaman daftar barang mahasiswa
    Route::get('/tambah-pinjam-barang', [BarangController::class, 'tambahPinjamBarang']); // menampilkan data peminjaman barang mahasiswa
    Route::get('/tambah-pinjam-barang', [MahasiswaController::class, 'tambahPinjamBarang']); // halaman tambah pinjam barang
    Route::post('/tambah-pinjam-barang', [PinjamBarangController::class, 'store']); // menambahkan data peminjaman barang ke tabel pinjam barang
    Route::get('/daftar-pinjam-barang-mahasiswa', [MahasiswaController::class, 'daftarPinjamBarangMahasiswa']); // menampilkan halaman daftar pinjam barang
    Route::get('/daftar-pinjam-barang-mahasiswa', [PinjamBarangController::class, 'tampilPinjamBarangMahasiswa']); // untuk memanggil data dari tabel pinjam barang
    Route::get('/lihat-pinjam-barang-mahasiswa/{pinjamBarang}/edit', [PinjamBarangController::class, 'lihatPinjamBarangMahasiswa']); // halaman untuk melihat hasil dari peminjaman yang dilakukan
    Route::put('/lihat-pinjam-barang-mahasiswa/{id}', [PinjamBarangController::class, 'updateMahasiswa']); // update data ruangan yang diedit

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
