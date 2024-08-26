<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->string('start_datetime')->nullable();
            $table->string('end_datetime')->nullable();
            $table->string('purpose')->nullable();

            $table->foreignId('society_id')->nullable()
                ->constrained('societies')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('facility_id')->nullable()
                ->constrained('facilities')
                ->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('bookings');
    }
};
