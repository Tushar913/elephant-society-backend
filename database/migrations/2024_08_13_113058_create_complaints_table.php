<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->string("name");
            $table->string('related_to')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('expected_resolution_date')->nullable();
            $table->string('feedback')->nullable();
            $table->string('priority')->nullable();
            $table->string('photo')->nullable();

            // relations
            $table->foreignId('society_id')->nullable()
                ->constrained('societies')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('wing_id')->nullable()
                ->constrained('wings')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('owner_id')->nullable()
                ->constrained('owners')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('tenant_id')->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('complaints');
    }
};
