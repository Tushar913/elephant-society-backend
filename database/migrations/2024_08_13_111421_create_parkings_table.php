<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('parkings', function (Blueprint $table) {
            $table->id();

            $table->string('vehicle_no')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('slot_no')->nullable();
            $table->boolean('is_billable')->default(false);

            $table->foreignId('owner_id')->nullable()
                ->constrained('owners')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('parkings');
    }
};
