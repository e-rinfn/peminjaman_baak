<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjam_ruangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ruangan');
            $table->string('organisasi');
            $table->integer('nim');
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('alasan');
            $table->string('surat_peminjaman')->nullable();
            $table->string('status');
            $table->string('pesan_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_ruangan');
    }
};
