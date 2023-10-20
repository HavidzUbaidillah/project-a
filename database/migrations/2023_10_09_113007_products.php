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
        Schema::create('products', function (Blueprint $table){
            $table->id('idProduct');
            $table->string('name')->unique();
            $table->string('description');
            $table->json('specs');
            $table->double('price');
            $table->text('imgPath');
            $table->integer('stock');
            $table->foreignid('seriesId')->constrained('series','idSeries');
            $table->foreignId('genderId')->constrained('genders','idGender');
            $table->foreignId('subCategoryId')->constrained('sub_categories','idSubCategory');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
