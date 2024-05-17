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
            $table->String('driver_name')->nullable();
            $table->String('apprehension_place')->nullable();
            $table->String('license_no')->nullable();
            $table->String('plate_no')->nullable();
            $table->String('registered_owner')->nullable();
            $table->String('owner_address')->nullable();
            $table->String('cigarette_type')->nullable();
            $table->String('apprehending_officer')->nullable();
            $table->String('police_station')->nullable();
            $table->String('encoded_by')->nullable();
            $table->timestamp('date_apprehended')->nullable();
            $table->String('remarks')->nullable();
            $table->String('payment_status')->nullable();
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
