<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class GendersModel extends Model
{
    use HasFactory;
    protected $table  = 'genders';
    protected $primaryKey  = 'idGender';
    protected $guarded = ['idGender'];

    public function getGender(){
        try {
            return DB::table('genders')
                ->select('gender')
                ->get();
        }catch (QueryException $e){
            return collect();
        }
    }

    public function createGender($input){
        return $this->create([
          'gender' => $input['gender'],
          'imgPath' => $input['imgPath'],
        ]);
    }
}
