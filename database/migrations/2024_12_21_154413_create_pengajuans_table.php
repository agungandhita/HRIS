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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id('pengajuan_id');
            $table->foreignId('pegawai_id')->constrained('pegawais', 'pegawai_id')->on('pegawais');
            $table->foreignId('absensi_id')->nullable();
            $table->enum('status', ['izin', 'cuti']);
            $table->date('tanggal_pengajuan')->nullable();
            $table->string('alasan')->nullable();
            $table->string('surat')->nullable();
            $table->enum('status_pengajuan', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->string('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
