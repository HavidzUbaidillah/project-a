<?php

namespace Database\Seeders;

use App\Models\CategoriesModel;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriesModel::create(['name' => 'SHOES']);
        CategoriesModel::create(['name' => 'CLOTHING']);
        CategoriesModel::create(['name' => 'ACCESSORIES']);
        CategoriesModel::create(['name' => 'SPORTS']);
    }
}
