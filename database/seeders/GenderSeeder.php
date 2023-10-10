<?php

namespace Database\Seeders;

use App\Models\GenderModel;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GenderModel::create([
           'gender' => 'pria'
        ]);
        GenderModel::create([
            'gender' => 'wanita'
        ]);
        GenderModel::create([
            'gender' => 'unisex'
        ]);
    }
}
