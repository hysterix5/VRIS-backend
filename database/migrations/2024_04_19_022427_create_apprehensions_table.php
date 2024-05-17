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
        Schema::create('apprehensions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('violator_id')->nullable();
            $table->foreignId('public_conveyance_id')->nullable();
            $table->foreignId('establishment_id')->nullable();
            $table->string('violation')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprehensions');
    }
};
