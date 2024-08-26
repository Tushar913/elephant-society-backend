<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string("maintainance_cost")->nullable();
            $table->string("property_tax_cost")->nullable();
            $table->string("water_charges")->nullable();
            $table->string("electricity_charges")->nullable();
            $table->string("vehicle_charges")->nullable();
            $table->string("is_paid")->nullable();
            $table->string("payment_mode")->nullable();
            $table->string("bill_month")->nullable();
            $table->string("bill_date")->nullable();
            $table->string("bill_year")->nullable();
            $table->string("invoice_id")->nullable();

            // foreign constraints
            $table->foreignId("maintaince_template_id")->nullable()
                ->constrained("maintaince_templates")
                ->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('invoices');
    }
};
