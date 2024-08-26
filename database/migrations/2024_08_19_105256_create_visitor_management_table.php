<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('visitor_management', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->text("purpose");
            $table->date('visit_date');
            $table->time("visit_time");
            $table->string("profile")->nullable();
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('visitor_management');
    }
};
