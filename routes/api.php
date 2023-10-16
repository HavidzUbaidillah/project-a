<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukSaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::apiResource('produk',ProdukController::class);
Route::apiResource('kategori',KategoriController::class);
Route::apiResource('banner',BannerController::class);
Route::apiResource('produk-sale/banner', ProdukSaleController::class);
//Route::apiResource('image' )
//Route::get('produk?kategori={kategori}', [ProdukController::class,'getProdukByKategori']);
