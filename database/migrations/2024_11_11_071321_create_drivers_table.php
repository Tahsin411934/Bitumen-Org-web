<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('driver_id'); // Auto-incremented primary key
            $table->string('name'); // Driver name
            $table->string('license_no'); // Driver's license number
            $table->string('nid_no'); // National ID number of the driver
            $table->string('contact_no'); // Contact number of the driver
            $table->unsignedBigInteger('truck_id'); // Foreign key column
            $table->timestamps(); // Created at and updated at timestamps

            // Define the foreign key relationship explicitly
            $table->foreign('truck_id')->references('truck_id')->on('trucks')->onDelete('cascade'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}

