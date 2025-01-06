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
            $table->id('penggajian_id');
            $table->foreignId('pegawai_id')->constrained('pegawais', 'pegawai_id');
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_terlambat');
            $table->decimal('total_gaji', 12, 2);
            $table->decimal('total_potongan', 12, 2);
            $table->decimal('gaji_bersih', 12, 2);
            $table->string('bulan');
            $table->integer('tahun');
            $table->date('tanggal_penggajian');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['belum_di_gaji', 'sudah_di_gaji'])->default('belum_di_gaji');
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
