<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigInteger('order_no')->unsigned(); // Foreign key to orders table
            $table->string('itemcode');
            $table->integer('quantity');
            $table->string('uom'); // Unit of measurement (e.g., kg, pcs)
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('order_no')->references('order_no')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
