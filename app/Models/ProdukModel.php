<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table  = 'produk';
    protected $primaryKey  = 'idProduk';
    protected $guarded = ['idProduk'];

    public function getDataProduk(): bool|Collection
    {
        try {
            return DB::table('produk')
                ->select('nama','deskripsi','harga','imgPath')
                ->orderBy('nama')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }
    public function produkByKategori(Request $input): bool|Collection
    {
        try {
            return DB::table('kategori')
                ->select('produk.nama','produk.deskripsi','produk.harga')
                ->join('produk', 'kategoriId','=','kategori.idKategori')
                ->where('kategori.nama','=',$input)
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function produkByGender(Request $input): bool|Collection
    {
        try {
            return DB::table('gender')
                ->select('produk.nama','produk.deskripsi','produk.harga')
                ->join('produk', 'genderId','=','gender.idGender')
                ->where('gender.gender','=',$input)
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function newProduk(){
        try {
            return DB::table('produk')
                ->select('nama','deskripsi','harga')
                ->orderBy('created_at','DESC')
                ->take(5)
                ->get();
        }catch (QueryException $e){
            return collect();
        }
    }

    public function createProduk(array $input){
        try {
            return $this->create([
                'nama' => $input['nama'],
                'deskripsi' => $input['deskripsi'],
                'harga' => $input['harga'],
                'stock' => $input['stock'],
                'imgPath' => $input['imgPath'],
                'kategoriId' => $input['kategoriId'],
                'genderId' => $input['genderId'],
            ]);
        }catch (QueryException $e){
            return collect();
        }
    }
}
