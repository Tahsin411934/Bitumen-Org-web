<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::dropIfExists('delivery_details');
}

public function down()
{
    // Recreate the table here if necessary, but for dropping it's not needed
}


    /**
     * Reverse the migrations.
     */
 
};
