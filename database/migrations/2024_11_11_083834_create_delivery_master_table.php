<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryMasterTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_master', function (Blueprint $table) {
            $table->unsignedBigInteger('challanno')->autoIncrement(); // Primary key with auto-increment
            $table->dateTime('datetime');
            $table->string('orderno');
            $table->string('client_name')->nullable();
            $table->string('address')->nullable();
            $table->string('truck_no');
            $table->string('driver');
            $table->string('license');
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('delivery_master');
    }
}

