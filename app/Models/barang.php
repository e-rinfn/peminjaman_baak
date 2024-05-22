<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode_barang', 'nama_barang', 'gambar'];
    protected $table = 'barang';
    public $timestamps = false; // timestamps tidak dimasukkan
}
