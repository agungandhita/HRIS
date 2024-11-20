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
        Schema::create('employes', function (Blueprint $table) {
            $table->id('employe_id');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('nomor_ktp', 16);
            $table->date('tanggal_lahir');
            $table->string('no_telepon', 14);
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->text('alamat_lengkap');
            $table->string('posisi');
            $table->string('cv');
            $table->string('foto');
            $table->string('surat_lamaran');
            $table->string('jenjang_pendidikan');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->decimal('nilai', 3, 2);
            $table->decimal('gpa', 3, 2);
            $table->string('nama_perusahaan')->nullable();
            $table->string('sebagai')->nullable();
            $table->integer('lama_bekerja')->nullable();
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->enum('status', ['unshorlisted','shortlisted', 'interview', 'on boarding']);
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->softDeletes();
            $table->integer('user_deleted')->nullable();
            $table->integer('deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
