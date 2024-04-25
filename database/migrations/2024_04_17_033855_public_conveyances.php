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
        Schema::create('public_conveyances', function (Blueprint $table) {
            $table->id();
            $table->String('driver_name');
            $table->String('apprehension_place');
            $table->String('license_no');
            $table->String('plate_no');
            $table->String('registered_owner');
            $table->String('owner_address');
            $table->String('apprehension_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_conveyances');
    }
};
