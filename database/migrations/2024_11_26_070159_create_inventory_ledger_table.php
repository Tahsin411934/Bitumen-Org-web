<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_ledger', function (Blueprint $table) {
            $table->id('trxid'); // Transaction ID (primary key)
            $table->date('date'); // Date of transaction
            $table->string('itemcode'); // Item code
            $table->string('DO_no')->nullable(); // Delivery Order number
            $table->integer('quantity'); // Quantity
            $table->string('uom'); // Unit of Measure
            $table->string('challan_no')->nullable(); // Challan number
            $table->string('order_no')->nullable(); // Order number
            $table->enum('status', ['verified', 'unverified']); // Verification status
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_ledger');
    }
};
