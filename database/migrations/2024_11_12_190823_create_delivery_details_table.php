<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('delivery_details', function (Blueprint $table) {
            $table->unsignedBigInteger('challanno'); // This is a foreign key, no auto-increment
            $table->string('purchase_no');
            $table->float('gross_weight');
            $table->float('empty_weight');
            $table->float('net_weight');
            $table->timestamps();
            
            // Foreign key constraint to the `challanno` field in the `delivery_master` table
            $table->foreign('challanno')
                ->references('challanno')
                ->on('delivery_master')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('delivery_details');
    }
}
