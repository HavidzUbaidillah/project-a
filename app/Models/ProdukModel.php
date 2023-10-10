<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table  = 'produk';
    protected $primaryKey  = 'idProduk';
    protected $guarded = ['idProduk'];

    public function getDataProduk(){
        try {
            return DB::table('produk')
                ->select('nama','deskripsi','harga')
                ->orderBy('nama','ASC')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function createProduk(array $input){

    }
}
