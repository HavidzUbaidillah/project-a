<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProductsModel extends Model
{
    protected $table  = 'img_products';
    protected $primaryKey  = 'idImgProducts';
    protected $guarded = ['idImgProducts'];

    public function createImgProducts($input){
        $this->create([
            'imgUrl' => $input['imgUrl'],
            'productId' => $input['productId'],
        ]);
    }
}
