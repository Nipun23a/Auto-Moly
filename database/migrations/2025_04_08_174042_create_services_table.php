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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Primary Key

            $table->string('name');
            $table->enum('type', ['insurance', 'financing', 'warranty', 'maintenance']);
            $table->string('provider');
            $table->text('description')->nullable();
            $table->string('cost_range')->nullable(); // E.g., "$500 - $1000" or "Varies"
            $table->string('url')->nullable(); // Link to provider or more info

            $table->timestamp('created_at')->useCurrent(); // No updated_at needed for static records
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
