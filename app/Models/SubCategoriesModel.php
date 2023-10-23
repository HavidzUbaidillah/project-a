<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SubCategoriesModel extends Model
{
    protected $table = 'sub_categories';
    protected $primaryKey = 'idSubCategory';
    protected $guarded = ['idSubCategory'];
    protected $fillable = ['name','categoryId','genderId'];

    public function subCategoriesShoesMen(): Collection
    {
        try {
            return DB::table('sub_categories')
                ->select('sub_categories.name')
                ->join('categories','categoryId','=','categories.idCategory')
                ->join('genders','genderId','=','genders.idGender')
                ->where('categories.name','=','SHOES')
                ->where('genders.gender','=','MEN')
                ->get()
                ->pluck('name');

        }catch (QueryException $e){
            return collect();
        }
    }

    public function subCategoriesShoesWomen(): Collection
    {
        try {
            return DB::table('sub_categories')
                ->select('sub_categories.name')
                ->join('categories','categoryId','=','categories.idCategory')
                ->join('genders','genderId','=','genders.idGender')
                ->where('categories.name','=','SHOES')
                ->where('genders.gender','=','WOMEN')
                ->get()
                ->pluck('name');

        }catch (QueryException $e){
            return collect();
        }
    }

    public function subCategoriesClothMen(): Collection
    {
        try {
            return DB::table('sub_categories')
                ->select('sub_categories.name')
                ->join('categories','categoryId','=','categories.idCategory')
                ->join('genders','genderId','=','genders.idGender')
                ->where('categories.name','=','CLOTHING')
                ->where('genders.gender','=','MEN')
                ->get()
                ->pluck('name');

        }catch (QueryException $e){
            return collect();
        }
    }

    public function subCategoriesClothWomen(): Collection
    {
        try {
            return DB::table('sub_categories')
                ->select('sub_categories.name')
                ->join('categories','categoryId','=','categories.idCategory')
                ->join('genders','genderId','=','genders.idGender')
                ->where('categories.name','=','CLOTHING')
                ->where('genders.gender','=','WOMEN')
                ->get()
                ->pluck('name');

        }catch (QueryException $e){
            return collect();
        }
    }

    public function subCategoriesAccesoriesMen(): Collection
    {
        try {
            return DB::table('sub_categories')
                ->select('sub_categories.name')
                ->join('categories','categoryId','=','categories.idCategory')
                ->join('genders','genderId','=','genders.idGender')
                ->where('categories.name','=','ACCESSORIES')
                ->where('genders.gender','=','WOMEN')
                ->get()
                ->pluck('name');

        }catch (QueryException $e){
            return collect();
        }
    }

    public function subCategoriesAccesoriesWomen(): Collection
    {
        try {
            return DB::table('sub_categories')
                ->select('sub_categories.name')
                ->join('categories','categoryId','=','categories.idCategory')
                ->join('genders','genderId','=','genders.idGender')
                ->where('categories.name','=','ACCESSORIES')
                ->where('genders.gender','=','WOMEN')
                ->get()
                ->pluck('name');

        }catch (QueryException $e){
            return collect();
        }
    }

    public function createNewSubCategories(array $input): bool
    {
        try {
            $this->create([
                 'name' => $input['name'],
                 'categoryId' => $input['categoryId'],
                 'genderId' => $input['genderId'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
}
