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
//    protected $fillable = ['name','description','specs','price','imgPath','stock','seriesId','genderId','subCategoryId'];
    protected $casts = [
        'specs' => 'array',
        'imgPath' => 'array',
    ];

    public function AllDataProduk(): bool|Collection
    {
        try {
            $products = DB::table('products')
                ->select('name', 'description','price','imgPath','specs')
                ->orderBy('name')
                ->get();

            foreach ($products as $product) {
                $product->imgPath = json_decode(json_decode($product->imgPath), true);
                $product->specs = json_decode(json_decode($product->specs), true);
            }
            return $products;
        }catch (QueryException){
            return false;
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

    public function newProducts(): Collection
    {
        try {
            return DB::table('products')
                ->select('name','description','price','imgPath')
                ->orderBy('created_at','DESC')
                ->take(5)
                ->get();
        }catch (QueryException){
            return collect();
        }
    }

    public function createProducts($input): bool
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
                'imgPath' => json_encode([
                    'img1' => $input['img1'],
                    'img2' => $input['img2'],
                    'img3' => $input['img3'],
                    'img4' => $input['img4']
                ]),
                'stock' => $input['stock'],
                'seriesId' => $input['seriesId'],
                'genderId' => $input['genderId'],
                'categoryId' => $input['categoryId'],
                'subCategoryId' => $input['subCategoryId'],
            ]);
        }catch (QueryException $e){
            error_log($e->getMessage());
            return false;
        }
        return true;
    }
}
