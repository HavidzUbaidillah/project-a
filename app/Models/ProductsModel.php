<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;

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

    public function searchSide($categories, $gender, $min, $max): bool|Collection
    {
        try {
            $query = DB::table('products')
                ->select('products.name','genders.gender', 'products.description', 'products.specs', 'products.price')
                ->join('categories','products.categoryId','=','categories.idCategory')
                ->join('genders', 'products.genderId', '=', 'genders.idGender');

            if ($min !='' && $max !='') {
                $query->whereBetween('products.price', [$min, $max]);
            }
            if (!empty($gender)) {
                $query->where('genders.gender', 'like', '%' . $gender . '%');
            }
            if (!empty($categories)) {
                $query->where('categories.name', 'like', '%' . $categories . '%');
            }
            $products = $query->get();
            foreach ($products as $product) {
                $product->specs = json_decode(json_decode($product->specs));
            }
            return $products;
        }catch (QueryException){
            return false;
        }
    }

    public function productByName($input): bool|Collection
    {
        try {
            $products = DB::table('products')
                ->select('products.idProduct','products.name','description','products.imgPath','specs','price','genders.gender','sub_categories.name as subCategory_name')
                ->join('genders','IdGender','=','products.genderId')
                ->join('sub_categories','idSubCategory','=','products.subCategoryId')
                ->where('products.name','like', '%'.$input.'%')
                ->take(4)
                ->get();
            foreach ($products as $product) {
                $product->imgPath = json_decode(json_decode($product->imgPath));
                $product->specs = json_decode(json_decode($product->specs));
            }
            return $products;
        }catch (QueryException){
            return false;
        }
    }

    public function productByCategories($input): bool|Collection
    {
        try {
            return DB::table('products')
                ->select('products.name','products.description','products.price')
                ->join('categories', 'categoryId','=','categories.idCategory')
                ->where('categories.name','like','%'.$input.'%')
                ->take(100)
                ->get();
        }catch (QueryException){
            return collect();
        }
    }

    public function productByGender($input): bool|Collection
    {
        try {
            return DB::table('products')
                ->select('products.name','products.description','products.price')
                ->join('genders', 'genderId','=','genders.idGender')
                ->where('genders.gender','like','%'.$input.'%')
                ->get();
        }catch (QueryException){
            return false;
        }
    }


    public function productBySeries($input): bool|Collection
    {
        try {
            return DB::table('products')
                ->select('products.name','products.description','products.price')
                ->join('series', 'seriesId','=','series.idSeries')
                ->where('series.name','like','%'.$input.'%')
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

    public function deleteProduct($id){
        return DB::table('products')
            ->where('idProduct',$id)
            ->delete();
    }
}
