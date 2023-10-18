<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TopProdukModel extends Model
{
    use HasFactory;
    protected $table  = 'topProduk';
    protected $primaryKey  = 'idTopProduk';
    protected $guarded = ['idTopProduk'];

    public function getTopProduk(){
        return DB::table('topProduk')
            ->select('produk.nama','produk.harga','produk.imgPath')
            ->get();
    }
}
