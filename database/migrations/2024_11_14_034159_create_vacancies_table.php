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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id('vacancy_id');
            $table->string('title');
            $table->string('cabang');
            $table->string('provinsi');
            $table->enum('level', ['kontrak', 'tetap']);
            $table->enum('type_job', ['full time', 'shift']);
            $table->date('posting_date');
            $table->date('closing_date');
            $table->json('job_description');
            $table->json('qualifications');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->integer('user_created')->nullable();
            $table->integer('user_updated')->nullable();
            $table->softDeletes();
            $table->integer('user_deleted')->nullable();
            $table->integer('deleted')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
