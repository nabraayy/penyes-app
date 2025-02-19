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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->integer('x');
            $table->integer('y');
            $table->unsignedBigInteger('penya_id');
            $table->timestamps();
            // Clave foránea si 'penya_id' se relaciona con 'penyes'
            $table->foreign('penya_id')->references('id')->on('penyes')->onDelete('cascade');

        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
