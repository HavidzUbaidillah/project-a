<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class BannerModel extends Model
{
    use HasFactory;
    protected $table  = 'banner';
    protected $primaryKey  = 'idBanner';
    protected $guarded = ['idBanner'];

    public function getBanner(){
        try {
            return DB::table('banner')
                ->select('imgUrl')
                ->get();
        }catch (QueryException $e){
            return false;
        }
    }
}
