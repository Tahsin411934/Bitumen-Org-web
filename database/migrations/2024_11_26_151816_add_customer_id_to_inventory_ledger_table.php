<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inventory_ledger', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable(); // Add column at the end
            // If you want to add a foreign key constraint:
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventory_ledger', function (Blueprint $table) {
            $table->dropColumn('customer_id');
            // If you added a foreign key, drop it as well:
            // $table->dropForeign(['customer_id']);
        });
    }
};


