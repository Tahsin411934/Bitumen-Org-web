<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStockSourceToDeliveryMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_master', function (Blueprint $table) {
            // Add the new column "stock_source"
            $table->string('stock_source')->nullable();  // Adjust the type or nullability based on your needs
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_master', function (Blueprint $table) {
            // Remove the column if the migration is rolled back
            $table->dropColumn('stock_source');
        });
    }
}
