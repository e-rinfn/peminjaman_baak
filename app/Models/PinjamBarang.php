<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_barang',
        'organisasi',
        'nim',
        'nama',
        'email',
        'no_hp',
        'tgl_pinjam',
        'tgl_kembali',
        'alasan',
        'gambar_kembali',
        'surat_peminjaman',
        'status',
        'pesan_admin',
    ];

    protected $table = 'pinjam_barang';

    public $timestamps = false; // timestamps tidak dimasukkan
}
