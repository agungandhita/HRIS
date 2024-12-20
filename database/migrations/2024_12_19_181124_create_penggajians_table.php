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
        Schema::create('penggajians', function (Blueprint $table) {
            $table->id('gaji_id');
            $table->foreignId('pegawai_id')->constrained('pegawais', 'pegawai_id')->onDelete('cascade');
            $table->date('tanggal_gaji');
            $table->integer('total_hari_kerja')->default(0);
            $table->integer('potongan_terlambat')->default(0);
            $table->integer('total_gaji')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajians');
    }
};
