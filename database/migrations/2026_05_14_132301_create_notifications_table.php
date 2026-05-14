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
        Schema::create('notifications', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('user_id')->constrained()->onDelete('cascade');
            $blueprint->string('title');
            $blueprint->text('message');
            $blueprint->string('type')->default('info'); // e.g., 'class_reminder'
            $blueprint->boolean('is_read')->default(false);
            $blueprint->unsignedBigInteger('related_schedule_id')->nullable();
            $blueprint->timestamps();

            $blueprint->index(['user_id', 'is_read']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
