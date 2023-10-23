<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class SubCategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $primaryKey = 'idSubCategory';
    protected $guarded = ['idSubCategory'];


    public function AllDataSubCategories(): Collection
    {
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
            return collect();
        }
    }
}
