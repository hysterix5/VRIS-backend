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
            $table->String('firstname');
            $table->String('middlename');
            $table->String('lastname');
            $table->String('suffix');
            $table->String('sex');
            $table->String('address');
            $table->timestamp('birthdate');
            $table->String('occupation');
            $table->String('dqrcode');
            $table->String('apprehension_type');
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
