<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class EventProductsModel extends Model
{
    use HasFactory;

    public function getAllEventProducts(Request $input){
        try {

        }catch (QueryException $e){

        }
        return DB::table('products')
            ->select('name','description','price','imgPath')
            ->join('eventProducts','productId','=','products.idProduct')
            ->join('events','eventId','=','events.idEvent')
            ->where('events.name','=',$input)
            ->get();
    }
    public function createEventProducts(array $input){
        try {
            return $this->create([
                'productId' => $input['productId'],
                'eventId' => $input['eventId'],
            ]);
        }catch (QueryException $e){
            return collect();
        }
    }
}
