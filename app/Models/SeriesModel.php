<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class SeriesModel extends Model
{
    protected $table  = 'series';
    protected $primaryKey  = 'idSeries';
    protected $guarded = ['idSeries'];
    protected $fillable = ['name','description','imgPath'];

    public function ALlDataSeries(){
        try {
            return DB::table('series')
                ->select('name','imgPath')
                ->get();
        }catch (QueryException $e){
            return collect();
        }
    }

    public function createNewSeries(array $input): bool{
        try {
            $this->create([
                'name' => $input['name'],
                'imgPath' => $input['imgPath'],
            ]);
            return true;
        }catch (QueryException $e){
            dd($e->getMessage());
            return false;
        }
    }

}
