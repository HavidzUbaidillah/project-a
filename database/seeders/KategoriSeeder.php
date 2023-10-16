<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriModel::create([
           'nama' => 'sepatu',
            'imgPath' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160990364400898250/p-6000-shoes-WCPL3C.jpeg?ex=6536ab89&is=65243689&hm=c222d2e5dc998ae707eb80ce4718b3938d54820636a514b9e97af5504bf63b06&'
        ]);
        KategoriModel::create([
            'nama' => 'kaos',
            'imgPath' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160989579931816106/sportswear-t-shirt-bBXDzr.jpeg?ex=6536aacd&is=652435cd&hm=8f0ef69725442adb9ee75f02c18ba94f1a529f52be42d7e7f09c231328099906&'
        ]);
        KategoriModel::create([
            'nama' => 'topi',
            'imgPath' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160990364149227630/dri-fit-fly-unstructured-swoosh-cap-jsRTMl.jpeg?ex=6536ab88&is=65243688&hm=10a1e6b2a7704e61630e41626bd4844a4f2d0b67e2c707f1914dfef94403963b&'
        ]);
        KategoriModel::create([
            'nama' => 'sweater',
            'imgPath' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160991749536227388/sportswear-over-oversized-crew-neck-fleece-sweatshirt-bZK2SV.jpeg?ex=6536acd3&is=652437d3&hm=9781e05eb713ecf62fc1e3a439a4b38176cbd57ab2c2fb46cdf9b8d9fde1e54c&'
        ]);
        KategoriModel::create([
            'nama' => 'short pants',
            'imgPath' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160989579466252339/sportswear-sport-essentials-woven-lined-flow-shorts-l9pxRQ.jpeg?ex=6536aacd&is=652435cd&hm=bc4260be3cbcdb6f41b9e1ee0b0a1c7be765b6dd1496d1850fe9f495787cc157&'
        ]);
        KategoriModel::create([
            'nama' => 'jogger pants',
            'imgPath' => 'https://cdn.discordapp.com/attachments/1159144842794909826/1160989579092955206/sportswear-high-waisted-oversized-fleece-tracksuit-bottoms-41HBb9.jpeg?ex=6536aacd&is=652435cd&hm=1566856b3008714b9793851f0b431fa5982f31835c212beb418d1e9b8131c95d&'
        ]);
    }
}
