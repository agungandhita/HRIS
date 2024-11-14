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
            $table->string('job_type');
            $table->string('location'); 
            $table->enum('level', ['kontrak', 'tetap']);
            $table->date('posting_date');
            $table->date('closing_date');
            $table->integer('vacancy_count');
            $table->text('job_description');
            $table->text('qualifications');
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
