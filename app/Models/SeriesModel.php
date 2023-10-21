<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SeriesModel extends Model
{
    use HasFactory;

    public function ALlDataSeries(){
        try {
            return DB::table('series')
                ->select('name','imgPath','description')
                ->get();
        }catch (QueryException $e){
            return collect();
        }
    }

    public function createNewSeries(array $input){
        try {
            return $this->create([
                'name' => $input['name'],
                'imgPath' => $input['imgPath'],
                'description' => $input['description']
            ]);
        }catch (QueryException $e){
            return collect();
        }
    }

}
