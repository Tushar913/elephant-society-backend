<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('societies', function (Blueprint $table) {
            $table->id();

            $table->string("name")->nullable();
            $table->string("registration_no")->nullable();
            $table->text("address")->nullable();

            $table->string("no_wings")->nullable();
            $table->string("no_car_parks")->nullable();
            $table->string("no_bike_parks")->nullable();
            $table->string("no_shops")->nullable();
            $table->string("gardens")->nullable();

            $table->string("logo")->nullable();
            $table->string("oc")->nullable();
            $table->string("cc")->nullable();
            $table->string("renewal_date")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('societies');
    }
};
