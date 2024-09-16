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
        Schema::create('fasilitas_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama_fasilitas');
            $table->text('deskripsi');
            $table->string('jenis_fasilitas');
            $table->string('kondisi_fasilitas');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_sekolahs');
    }
};
