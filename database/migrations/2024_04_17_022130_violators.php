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
        Schema::create('violators', function (Blueprint $table) {
            $table->id();
            $table->String('firstname')->nullable();
            $table->String('middlename')->nullable();
            $table->String('lastname')->nullable();
            $table->String('suffix')->nullable();
            $table->String('sex')->nullable();
            $table->String('address')->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->String('occupation')->nullable();
            $table->String('dqrcode')->nullable();
            $table->String('apprehension_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violators');
    }
};
