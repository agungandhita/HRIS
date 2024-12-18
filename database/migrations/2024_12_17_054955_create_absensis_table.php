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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id('absensi_id');
            $table->foreignId('pegawai_id')->constrained('pegawais', 'pegawai_id')->onDelete('cascade');
            $table->date('tanggal_absensi');
            $table->time('jam_masuk');
            $table->time('jam_pulang')->nullable();
            $table->text('keterangan')->nullable();
            // $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
