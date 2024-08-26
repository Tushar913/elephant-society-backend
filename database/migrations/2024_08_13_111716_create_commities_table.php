<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('commities', function (Blueprint $table) {
            $table->id();

            $table->string('role')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('tenure_date')->nullable();

            $table->foreignId('society_id')->nullable()
                ->constrained('societies')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('wing_id')->nullable()
                ->constrained('wings')
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
        Schema::dropIfExists('commities');
    }
};
