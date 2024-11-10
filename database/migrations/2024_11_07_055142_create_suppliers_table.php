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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->unsignedBigInteger('supplied_id')->primary(); // Primary key is supplied_id
            $table->string('suppliername'); 
            $table->string('address'); 
            $table->string('city'); 
            $table->string('contact_person'); 
            $table->string('mobile');
            $table->string('email')->nullable(); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};