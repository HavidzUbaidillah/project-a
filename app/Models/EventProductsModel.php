<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\ResponsiveImages\Exceptions\InvalidTinyJpg;

class EventProductsModel extends Model
{
    protected $table = 'event_products';
    protected $primaryKey = 'idEventProduct';
    protected $guarded = ['idEventProduct'];

    public function getAllEventProducts(Request $input){
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
