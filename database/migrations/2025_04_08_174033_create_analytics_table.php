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
        Schema::create('vehicle_analytics', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade'); // FK to vehicles table

            $table->integer('views')->default(0);
            $table->integer('inquiries')->default(0);
            $table->integer('favorites')->default(0);
            $table->decimal('click_through_rate', 5, 2)->default(0.00); // Example: 23.75%

            $table->date('date_tracked'); // for tracking by day
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics');
    }
};
