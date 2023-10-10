<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProdukSaleModel extends Model
{
    use HasFactory;
    protected $table  = 'produkSale';
    protected $guarded = ['saleId','produkId'];

    public function getProdukSale(){
        try {
            return DB::table('produkSale')
                ->select('sale.event','sale.diskon','produk.nama','produk.deskripsi','produk.harga')
                ->join('sale','saleId','=','sale.idSale')
                ->join('produk','produkId','=','produk.idProduk')
                ->orderBy('sale.event','ASC')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }
}
