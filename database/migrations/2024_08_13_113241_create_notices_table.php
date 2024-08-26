<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();

            // TODO: it should be title instead of name
            $table->string('name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('venue')->nullable();
            $table->string('time')->nullable();
            $table->string('remarks')->nullable();
            $table->string('priority')->nullable();
            $table->boolean('is_event')->default(false);

            $table->foreignId('society_id')->nullable()
                ->constrained('societies')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('wing_id')->nullable()
                ->constrained('wings')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('notices');
    }
};
