<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoriesModel extends Model
{
    use HasFactory;
    protected $table  = 'categories';
    protected $primaryKey  = 'idCategory';
    protected $guarded = ['idCategory'];

    public function getKategori(){
        try {
            return DB::table('categories')
                ->select('name')
                ->orderBy('name','ASC')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }

    public function createKategori(array $input){
        try {
            return $this->create([
                'name' => $input['name'],
                'imgPath' => $input['imgPath'],
            ]);
        }catch (QueryException $e){
            return collect();
        }
    }
}
