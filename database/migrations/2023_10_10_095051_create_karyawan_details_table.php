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
        Schema::create('karyawan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_karyawan_id');
            $table->foreign('data_karyawan_id')->references('id')->on('data_karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tugas_karyawan_id');
            $table->foreign('tugas_karyawan_id')->references('id')->on('tugas_karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan_details');
    }
};
