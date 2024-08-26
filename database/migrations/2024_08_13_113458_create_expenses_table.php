<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('photo')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_mode')->nullable();
            $table->boolean('is_paid')->default(false);

            $table->foreignId('society_id')->nullable()
                ->constrained('societies')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('wing_id')->nullable()
                ->constrained('wings')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('commitie_id')->nullable()
                ->constrained('commities')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('expenses');
    }
};
