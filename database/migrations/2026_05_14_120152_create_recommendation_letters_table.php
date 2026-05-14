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
        Schema::create('recommendation_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data Dosen
            $table->string('lecturer_name');
            $table->string('lecturer_nip');
            $table->string('lecturer_position');

            // Data Calon Tutor
            $table->string('student_name');
            $table->string('student_nim');
            $table->string('student_prodi');

            // Lokasi & Tanggal
            $table->string('place')->default('Palembang');
            $table->date('date');

            // Tanda Tangan
            $table->string('pa_lecturer_name');
            $table->string('pa_lecturer_nip');
            $table->string('course_lecturer_name');
            $table->string('course_lecturer_nip');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendation_letters');
    }
};
