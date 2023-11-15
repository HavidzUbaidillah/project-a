<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
   public function checkStoreUpdate(ProductsModel $productsModel): JsonResponse
   {
       try {
           $data = $productsModel->productLastUpdate();
           return response()->json([
               'message' => 'success',
               'data' => $data,
           ]);
       }catch (QueryException){
           return response()->json([
              'message' => 'error'
           ],500);
       }
   }
}
