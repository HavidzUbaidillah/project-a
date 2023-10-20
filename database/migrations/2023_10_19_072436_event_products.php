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
        Schema::create('event_products', function (Blueprint $table){
            $table->id('idEventProduct');
            $table->foreignId('productId')->constrained('products','idProduct');
            $table->foreignId('eventId')->constrained('events','idEvent');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
