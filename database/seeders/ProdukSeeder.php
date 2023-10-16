<?php

namespace Database\Seeders;

use App\Models\ProdukModel;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdukModel::create([
            'nama'  =>  'Nike Air Jordan 1',
            'deskripsi' => 'Nike Air Jordan adalah sebuah sepatu yang didesain untuk atlet basket',
            'harga' => '2500000',
            'stock' => '5',
            'imgPath' => '',
            'kategoriId' => '1',
            'genderId'  =>  '3',
        ]);
        ProdukModel::create([
            'nama'  =>  'Nike Hat Vintage',
            'deskripsi' => 'Nike Hat Vintage adalah sebuah topi yang digunakan sebagai lifestyle',
            'harga' => '700000',
            'stock' => '2',
            'imgPath' => '',
            'kategoriId' => '3',
            'genderId'  =>  '2',
        ]);
    }
}
