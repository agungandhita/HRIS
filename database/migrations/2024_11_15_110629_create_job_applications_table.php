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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id('application_id');
            $table->foreignId('vacancy_id')->references('vacancy_id')->on('vacancies')->onDelete('cascade');
            $table->foreignId('lamar_id');
            $table->enum('status', ['applied', 'shortlisted', 'interview', 'rejected', 'on boarding'])->default('applied');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
