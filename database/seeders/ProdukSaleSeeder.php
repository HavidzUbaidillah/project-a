<?php

namespace Database\Seeders;

use App\Models\ProdukSaleModel;
use Illuminate\Database\Seeder;

class ProdukSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdukSaleModel::create([
            'saleId' => '1',
            'produkId' => '1',
        ]);
    }
}
