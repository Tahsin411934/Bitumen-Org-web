<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_no'); // Auto-increment primary key
            $table->date('orderdate');
            $table->unsignedBigInteger('customerid');
            $table->string('reference')->nullable();
            $table->string('deliverylocation');
            $table->string('address');
            $table->text('remark')->nullable();
            $table->string('contact_person');
            $table->string('contact_phone');
            $table->timestamps();

            // Foreign key constraint (assuming customers table exists)
          
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
