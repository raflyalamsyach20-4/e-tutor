<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
public function up()
{
    Schema::create('pengajuan_tutor', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('nama');
        $table->string('nim');
        $table->string('topik_pembahasan');
        $table->string('bukti_memenuhi');
        $table->text('deskripsi_job');
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->text('catatan_kaprodi')->nullable();
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_tutor');
    }
};
