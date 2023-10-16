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
        Schema::create('produk', function (Blueprint $table){
            $table->id('idProduk');
            $table->string('nama')->unique();
            $table->text('deskripsi');
            $table->double('harga');
            $table->integer('stock');
            $table->string('imgPath');
            $table->foreignid('kategoriId')->constrained('kategori','idKategori');
            $table->foreignId('genderId')->constrained('gender','idGender');
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
