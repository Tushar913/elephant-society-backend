<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('wings', function (Blueprint $table) {
            $table->id();

            $table->string("wing_name")->nullable();
            $table->string("no_floors")->nullable();
            $table->string("no_flats")->nullable();
            $table->string("no_lifts")->nullable();
            $table->string("fire_extinguisher_date")->nullable();

            $table->foreignId("society_id")->constrained("societies")
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('wings');
    }
};
