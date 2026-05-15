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
        Schema::table('teaching_schedules', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('pendaftaran_kelas', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teaching_schedules', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('pendaftaran_kelas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
