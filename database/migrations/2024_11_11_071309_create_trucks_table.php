<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id('truck_id'); // Auto-incremented primary key
            $table->string('reg_no'); // Registration number
            $table->decimal('capacity', 10, 2); // Truck capacity (e.g., in tons)
            $table->string('type'); // Type of truck (e.g., Flatbed, Refrigerated)
            $table->string('brand'); // Truck brand (e.g., Volvo, Mercedes)
            $table->year('year'); // Year of manufacturing
            $table->string('chassis_no'); // Chassis number (unique identifier)
            $table->integer('tier_count'); // Number of tires
            $table->string('tier_size'); // Tire size
            $table->decimal('mileage', 8, 2); // Mileage of the truck
            $table->string('fuel_type'); // Fuel type (e.g., Diesel, Electric)
            $table->timestamps(); // Cr/ Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trucks');
    }
}

