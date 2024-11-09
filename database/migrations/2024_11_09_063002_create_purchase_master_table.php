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
        Schema::create('purchase_master', function (Blueprint $table) {
            $table->id('purchase_no');  // Primary key for purchase master
            $table->date('purchase_date');
            $table->unsignedBigInteger('supplier_id');  // Foreign key reference column
            $table->string('DO_InvoiceNo');
            $table->text('remarks')->nullable();

            // Foreign key reference to suppliers table, referencing 'supplied_id' in suppliers table
            $table->foreign('supplier_id')->references('supplied_id')->on('suppliers')->onDelete('cascade'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_master');
    }
};
