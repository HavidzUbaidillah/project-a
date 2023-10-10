<?php

namespace Database\Seeders;

use App\Models\BannerModel;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BannerModel::create([
            'imgUrl' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160993917295132672/YC333JKSXFIDBPSJ5ST2T25XWE.jpg?ex=6536aed8&is=652439d8&hm=4f169333ccd782a098935fc6379ee3cd7274210b4aeaab36680f7d5b547f93ac&',
        ]);
        BannerModel::create([
            'imgUrl' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160993789066875050/117751671_satan-shoes1.jpg?ex=6536aeb9&is=652439b9&hm=51375b5756e5ea30fecda86a488051eaec242231271824c510904db3d8d505d0&',
        ]);
        BannerModel::create([
            'imgUrl' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160993789301768232/106437178-1583951027204gettyimages-1206795687.jpeg?ex=6536aeb9&is=652439b9&hm=fc34e83a183e29ea81785403f27ab1e75ba1b9aa5b43e03d0c22616f62eb4cac&',
        ]);
    }
}
