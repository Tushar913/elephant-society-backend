<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();

            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("flat_no")->nullable();
            $table->string("adhaar")->nullable();
            $table->string("pan")->nullable();
            $table->string("agreement")->nullable();
            $table->string("photo")->nullable();
            $table->string("flat_sqrft")->nullable();
            $table->string("other_docs")->nullable();

            $table->foreignId("society_id")->nullable()->constrained("societies")
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("wing_id")->nullable()->constrained("wings")
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('owners');
    }
};
