<?php
// database/migrations/xxxx_xx_xx_create_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('penya_id')->constrained()->onDelete('cascade');
            $table->string('name')->nullable;
            $table->string('description')->nullable();
            $table->enum('status',['pending','accepted','rejected'])->default('pending'); // pending, accepted, denied
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};