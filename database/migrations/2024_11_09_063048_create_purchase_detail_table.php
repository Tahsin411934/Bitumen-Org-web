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
        Schema::create('purchase_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('purchase_no');
            $table->string('itemcode');
            $table->integer('quantity');
            $table->string('uom');
            $table->decimal('price', 10, 2);
            $table->string('storage_location');
            $table->primary(['purchase_no', 'itemcode']);  // Composite primary key
            $table->foreign('purchase_no')->references('purchase_no')->on('purchase_master');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_detail');
    }
};
