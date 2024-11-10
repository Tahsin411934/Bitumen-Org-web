<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_no');  

          
            $table->string('itemcode');  
            $table->string('do_invoice_no');  

           
            $table->foreign('purchase_no')->references('purchase_no')->on('purchase_master')->onDelete('cascade'); 
            $table->integer('quantity');  
            $table->string('uom');  
            $table->decimal('price', 10, 2);  
            $table->string('location');  
            $table->string('status')->default('pending');;  

            // Ensure combination of purchase_no and itemcode is unique
            $table->unique(['purchase_no', 'itemcode']);  // Unique constraint on the combination of purchase_no and itemcode

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};


