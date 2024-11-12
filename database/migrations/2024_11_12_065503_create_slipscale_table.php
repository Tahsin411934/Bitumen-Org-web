<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipscaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slipscale', function (Blueprint $table) {
            $table->id('slipno'); // Auto-incremented primary key
            $table->string('orderno'); // Order number
            $table->string('plant'); // Plant name or ID
            $table->string('ticketno'); // Ticket number
            $table->timestamp('first_weight_date')->nullable(); // Date of first weight
            $table->time('first_weight_time')->nullable(); // Time of first weight
            $table->string('first_weight_ref')->nullable(); // Reference for first weight
            $table->timestamp('second_weight_date')->nullable(); // Date of second weight
            $table->time('second_weight_time')->nullable(); // Time of second weight
            $table->string('second_weight_ref')->nullable(); // Reference for second weight
            $table->decimal('duration_on_site', 8, 2)->nullable(); // Duration on site (in hours, for example)
            $table->string('operator'); // Operator name or ID
            $table->string('vehicle_regi'); // Vehicle registration number
            $table->string('customer'); // Customer name or ID
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slipscale');
    }
}
