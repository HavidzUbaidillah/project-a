<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductsModel extends Model
{
    use HasFactory;
    protected $table  = 'products';
    protected $primaryKey  = 'idProduct';
    protected $guarded = ['idProduct'];

    public function getDataProduk(): bool|Collection
    {
        return DB::table('products')
            ->select('name','description','price','imgPath')
            ->orderBy('name')
            ->get();
    }
    public function produkByKategori(Request $input): bool|Collection
    {
        return DB::table('categories')
            ->select('products.name','products.description','products.price')
            ->join('products', 'categoryId','=','categories.idCategory')
            ->where('categories.name','=',$input)
            ->get();
    }

    public function produkByGender(Request $input): bool|Collection
    {
        try {
            return DB::table('genders')
                ->select('products.name','products.description','products.price')
                ->join('products', 'genderId','=','genders.idGender')
                ->where('genders.gender','=',$input)
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function newProduk(){
        try {
            return DB::table('products')
                ->select('name','description','price')
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
                'name' => $input['name'],
                'descriprion' => $input['descriprion'],
                'price' => $input['price'],
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