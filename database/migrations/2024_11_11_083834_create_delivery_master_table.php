<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDeliveryMasterTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_master', function (Blueprint $table) {
            $table->bigIncrements('challanno'); // Auto-increment primary key
            $table->dateTime('datetime');
            $table->string('orderno');
            $table->string('client_name')->nullable();
            $table->string('address')->nullable();
            $table->string('truck_no');
            $table->string('driver');
            $table->string('license');
            $table->timestamps();
        });

        // Set the auto-increment starting value for the `challanno` column
        DB::statement('ALTER TABLE delivery_master AUTO_INCREMENT = 1001');
    }

    public function down()
    {
        Schema::dropIfExists('delivery_master');
    }
}
