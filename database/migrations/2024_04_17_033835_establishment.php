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
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('address')->nullable();
            $table->String('registered_owner')->nullable();
            $table->String('permit')->nullable();
            $table->String('establishment_type')->nullable();
            $table->String('remarks')->nullable();
            $table->String('apprehending_officer')->nullable();
            $table->String('police_station')->nullable();
            $table->String('encoded_by')->nullable();
            $table->timestamp('date_apprehended')->nullable();
            $table->String('cigarette_type')->nullable();
            $table->String('payment_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
