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
    protected $table  = 'products';
    protected $primaryKey  = 'idProduct';
    protected $guarded = ['idProduct'];

    public function AllDataProduk(): bool|Collection
    {
        try {
            return DB::table('products')
                ->select('name','description','price','imgPath')
                ->orderBy('name')
                ->get();
        }catch (QueryException){
            return collect();
        }
    }
    public function produkByKategori(Request $input): bool|Collection
    {
        try {
            return DB::table('events')
                ->select('products.name','products.description','products.price')
                ->join('products', 'categoryId','=','events.idCategory')
                ->where('events.name','=',$input)
                ->get();
        }catch (QueryException){
            return collect();
        }
    }

    public function produkByGender(Request $input): bool|Collection
    {
        try {
            return DB::table('genders')
                ->select('products.name','products.description','products.price')
                ->join('products', 'genderId','=','genders.idGender')
                ->where('genders.gender','=',$input)
                ->get();
        }catch (QueryException){
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
        }catch (QueryException){
            return collect();
        }
    }

    public function createProduk(array $input): bool
    {
        try {
            $this->create([
                'name' => $input['name'],
                'description' => $input['description'],
                'specs' => json_encode([
                    'color' => $input['color'],
                    'size' => $input['size'],
                    'material' => $input['material']
                ]),
                'price' => $input['price'],
                'imgPath' => [
                    '1' => $input['1'],
                    '2' => $input['2'],
                    '3' => $input['3'],
                    '4' => $input['4']
                ],
                'stock' => $input['stock'],
                'seriesId' => $input['seriesId'],
                'genderId' => $input['genderId'],
                'subCategoryId' => $input['subCategoryId'],
            ]);
            return true;
        }catch (QueryException){
            return false;
        }
    }
}
