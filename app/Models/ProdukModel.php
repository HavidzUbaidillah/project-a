<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
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
                ->select('nama','deskripsi','harga')
                ->orderBy('nama','ASC')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }
    public function produkByKategori(): bool|Collection
    {
        try {
            return DB::table('kategori')
                ->select('produk.nama','produk.deskripsi','produk.harga')
                ->join('produk', 'kategoriId','=','kategori.idKategori')
                ->where('kategori.idKategori','=','a')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function produkByGender($input): bool|Collection
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
                ->orderBy('idProduk','DESC')
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
