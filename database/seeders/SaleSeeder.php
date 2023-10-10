<?php

namespace Database\Seeders;

use App\Models\SaleModel;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SaleModel::create([
            'event' => 'Diskon Kemerdekaan!',
            'diskon' => '40'
        ]);
    }
}
