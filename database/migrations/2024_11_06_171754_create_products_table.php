<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('itemcode');  // Auto-increment integer
            $table->string('itemname');
            $table->string('uom');
            $table->timestamps();
        });

        // Set the starting value of the auto-increment to 100
        DB::statement("ALTER TABLE products AUTO_INCREMENT = 100");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

