<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamRuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_ruangan',
        'organisasi',
        'nim',
        'nama',
        'email',
        'no_hp',
        'tgl_pinjam',
        'tgl_kembali',
        'alasan',
        'surat_peminjaman',
        'status',
        'pesan_admin',
    ];

    protected $table = 'pinjam_ruangan';

    public $timestamps = false; // timestamps tidak dimasukkan
}
