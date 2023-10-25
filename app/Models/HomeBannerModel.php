<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class HomeBannerModel extends Model
{
    protected $table = 'home_banner';
    protected $primaryKey = 'idHomeBanner';
    protected $guarded = ['idHomeBanner'];


    public function banner1(){
        return DB::table('home_banner')
            ->select('slug','description','imgPath')
            ->where('idHomeBanner','=','1')
            ->first();
    }
    public function banner2()
    {
        return DB::table('home_banner')
            ->select('slug','description','imgPath')
            ->where('idHomeBanner','=','2')
            ->first();
    }
    public function createNewBanner(array $input):bool{
        try {
            $this->create([
                'slug' => $input['slug'],
                'description' => $input['description'],
                'imgPath' => $input['imgPath'],
            ]);
            return true;
        }catch (QueryException){
            return false;
        }
    }
}
