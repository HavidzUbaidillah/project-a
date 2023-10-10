<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminModel;
use App\Models\GenderModel;
use App\Models\KategoriModel;
use App\Models\ProdukModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminSeeder::class,
            BannerSeeder::class,
            GenderSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class,
            SaleSeeder::class,
            ProdukSaleSeeder::class,
        ]);
    }
}
