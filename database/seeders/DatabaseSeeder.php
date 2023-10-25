<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdminModel;
use App\Models\GendersModel;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
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
            CategoriesSeeder::class,
            EventProductsSeeder::class,
            EventsSeeder::class,
            GendersSeeder::class,
            HomeBannerSeeder::class,
            ProductsSeeder::class,
            SeriesSeeder::class,
            SubCategoriesSeeder::class,
        ]);
    }
}
