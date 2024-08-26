<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('maintaince_templates', function (Blueprint $table) {
            $table->id();

            $table->string('per_sqrft_maintaince_cost')->default(0);
            $table->string('per_sqrft_property_tax')->default(0);
            $table->string('water_charges')->default(0);
            $table->string("electricity_charges")->default(0);
            $table->string('per_two_wheeler_charges')->default(0);
            $table->string('per_four_wheeler_charges')->default(0);
            $table->string('repair_fund')->default(0);
            $table->string('event_fund')->default(0);
            $table->string('billed_date')->nullable();
            $table->string('due_day')->nullable();

            $table->foreignId('society_id')->nullable()
                ->constrained('societies')
                ->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('maintaince_templates');
    }
};
