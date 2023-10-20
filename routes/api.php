<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\GenderKategoriController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProdukSaleController;
use App\Http\Controllers\TopProdukController;
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

Route::apiResource('produk',ProductsController::class,['index']);
Route::apiResource('create-produk',ProductsController::class,['store']);
Route::apiResource('kategori',CategoriesController::class,['index']);
Route::apiResource('create-kategori',CategoriesController::class,['store']);
Route::apiResource('banner',BannerController::class);
Route::apiResource('top-produk', TopProdukController::class);
Route::apiResource('produk-sale/banner', ProdukSaleController::class);
//Route::apiResource('gender-kategori', 'GenderKategoriController@getAllKategoriByGender');
//Route::apiResource('image' )
//Route::get('produk?kategori={kategori}', [ProductsController::class,'getProdukByKategori']);
