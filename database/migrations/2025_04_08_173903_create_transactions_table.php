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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger('buyer_id');
            $table -> unsignedBigInteger('vehicle_id');
            $table -> enum('payment_status',['paid','pending','refunded']);
            $table -> string('payment_method');
            $table->timestamps();

            $table -> foreign('buyer_id')->references('id')->on('users');
            $table -> foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
