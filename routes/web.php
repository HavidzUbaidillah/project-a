<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\GenderKategoriController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProdukSaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/produk', function () {
    return view('input_produk');
});
Route::get('/kategori', function () {
    return view('input_kategori');
});
Route::get('/banner', function () {
    return view('input_banner');
});

//Route::get('/produk',[ProductsController::class, 'index']);
//Route::get('/kategori',[CategoriesController::class, 'index']);
//Route::get('/banner',[BannerController::class,'index']);
Route::get('/produk-sale', [ProdukSaleController::class, 'index']);
//Route::get('/kategori/produk',[CategoriesController::class,'getProdukKategori']);
//Route::get('/produk', [ProductsController::class,'getProdukByKategori']);
Route::get('/produk/gender', [ProductsController::class,'getProdukByGender']);
Route::get('/newProduk',[ProductsController::class,'getNewProduk']);
Route::post('/insertKategori', [CategoriesController::class, 'store'])->name('insertKategori');
Route::post('/insertProduk', [ProductsController::class, 'store'])->name('insertProduk');
Route::post('/insertBanner',[BannerController::class,'store'])->name('insertBanner');
Route::get('/gender-kategori',[GenderKategoriController::class,'getAllKategoriByGender']);



