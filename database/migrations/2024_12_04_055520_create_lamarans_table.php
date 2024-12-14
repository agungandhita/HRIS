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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id('lamar_id');
            $table->foreignId('vacancy_id')->references('vacancy_id')->on('vacancies')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->date('tanggal_lahir');
            $table->string('no_telepon', 14);
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('alamat_lengkap', 255);
            $table->string('cv');
            $table->string('foto');
            $table->string('jenjang_pendidikan');
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('nilai')->default(0);
            $table->string('nama_perusahaan')->nullable();
            $table->string('sebagai')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('deskripsi_pekerjaan', 255)->nullable();
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
        Schema::dropIfExists('lamarans');
    }
};
