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
        Schema::table('delivery_details', function (Blueprint $table) {
            $table->string('itemcode')->nullable(); // Add the new column
        });

        // Copy data from `purchase_no` to `itemcode`
        DB::statement('UPDATE delivery_details SET itemcode = purchase_no');

        Schema::table('delivery_details', function (Blueprint $table) {
            $table->dropColumn('purchase_no'); // Drop the old column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_details', function (Blueprint $table) {
            $table->string('purchase_no')->nullable(); // Recreate the old column
        });

        // Copy data back to `purchase_no`
        DB::statement('UPDATE delivery_details SET purchase_no = itemcode');

        Schema::table('delivery_details', function (Blueprint $table) {
            $table->dropColumn('itemcode'); // Drop the new column
        });
    }
};
