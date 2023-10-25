<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class GendersModel extends Model
{
    use HasFactory;
    protected $table  = 'genders';
    protected $primaryKey  = 'idGender';
    protected $guarded = ['idGender'];
    protected $fillable = ['gender','imgPath'];

    public function AllDataGender(): bool|Collection
    {
        try {
            return DB::table('genders')
                ->select('gender','imgPath')
                ->get();
        }catch (QueryException){
            return false;
        }
    }

    public function creatNewGender(array $input):bool{
        try {
            $this->create([
                'gender' => $input['gender'],
                'imgPath' => $input['imgPath'],
            ]);
            return true;
        }catch (QueryException $e){
            return false;
        }
    }
}
