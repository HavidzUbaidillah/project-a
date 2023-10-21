<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SubCategoriesModel extends Model
{
    use HasFactory;

    public function AllDataSubCategories(){
        try {
            return DB::table('subCategories')
                ->select('name')
                ->get();
        }catch (QueryException $e){
            return collect();
        }
    }

    public function createNewSubCategories(array $input){
        try {
            return $this->create([
                'name' => $input['name'],
                'categoryId' => $input['categoryId'],
                'genderId' => $input['genderId'],
            ]);
        }catch (QueryException $e){
            return  collect();
        }
    }
}
