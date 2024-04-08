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
        Schema::create('mhs_kkns', function (Blueprint $table) {
            $table->id();
            $table->string('npm');
            $table->integer('jenis_kkn');
            $table->string('alamat_mhs');
            $table->string('penyakit');
            $table->string('kelompok')->nullable();
            $table->string('berkas_izin_ortu')->nullable();
            $table->string('talenta')->nullable();
            $table->string('berkas_kkn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_kkns');
    }
};
