<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kkns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kkn');
            $table->string('masa_kegiatan');
            $table->integer('jenis_kkn');
            $table->string('masa_pendaftaran');
            $table->string('tahun_ajaran');
            $table->string('semester');
            $table->string('kode_kkn');
            $table->integer('minimal_sks');
            $table->integer('kuota_peserta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kkns');
    }
};
