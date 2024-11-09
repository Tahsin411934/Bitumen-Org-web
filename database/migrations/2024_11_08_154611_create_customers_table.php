<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customerID'); // auto-increment primary key
            $table->string('customername');
            $table->string('customerType');
            $table->string('address');
            $table->string('city_district');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('contactperson');
            $table->string('contactperson_mobile');
            $table->timestamps();
        });

        // Set the AUTO_INCREMENT starting value to 1001
        DB::statement("ALTER TABLE customers AUTO_INCREMENT = 1001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
