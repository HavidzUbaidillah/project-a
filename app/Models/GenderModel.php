<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class GenderModel extends Model
{
    use HasFactory;
    protected $table  = 'gender';
    protected $primaryKey  = 'idGender';
    protected $guarded = ['idGender'];

    public function getGender(){
        try {
            return DB::table('gender')
                ->select('gender')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }
}
