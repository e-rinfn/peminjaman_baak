<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['kode_ruangan', 'nama_ruangan'];
    protected $table = 'ruangan';
    public $timestamps = false; // timestamps tidak dimasukkan
}
