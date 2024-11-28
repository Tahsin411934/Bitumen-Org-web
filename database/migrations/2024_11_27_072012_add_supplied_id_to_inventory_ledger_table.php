<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuppliedIdToInventoryLedgerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventory_ledger', function (Blueprint $table) {
            // Add the column
            $table->unsignedBigInteger('supplied_id')->nullable()->after('updated_at'); // Adjust the 'after' clause as needed

            // Add the foreign key constraint
            $table->foreign('supplied_id')
                  ->references('id')
                  ->on('supplies')
                  ->onDelete('cascade'); // Adjust the onDelete behavior if necessary
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventory_ledger', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['supplied_id']);
            // Then drop the column
            $table->dropColumn('supplied_id');
        });
    }
}

