<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RenameClientNameToShipToInDeliveryMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Alter the column name for MariaDB/MySQL
        DB::statement('ALTER TABLE delivery_master CHANGE COLUMN client_name ship_to VARCHAR(255)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse the column rename
        DB::statement('ALTER TABLE delivery_master CHANGE COLUMN ship_to client_name VARCHAR(255)');
    }
}
