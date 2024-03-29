<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SubCategoriesController;
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

Route::get('/input-gender', function () {
    return view('gender');
});
Route::get('/input-produk', function () {
    return view('input_produk');
});
Route::get('/series', function () {
    return view('input_kategori');
});
Route::get('/event', function () {
    return view('event');
});
Route::get('/subCat', function () {
    return view('banner');
});
Route::get('/gender', function (){
    return view('gender');
});
Route::get('/kategori', function (){
    return view('kategori');
});
Route::post('kategori',[CategoriesController::class,'store'])->name('kategori');
Route::post('/subCat',[SubCategoriesController::class,'store'])->name('subcat');
Route::post('event', [EventsController::class,'store'])->name('event');
Route::post('/gender',[GenderController::class,'store'])->name('gender');
Route::post('series',[SeriesController::class,'store'])->name('series');
Route::post('product',[ProductsController::class,'store'])->name('product');
Route::post('banner',[HomeBannerController::class,'store'])->name('banner');
//Route::get('/produk',[ProductsController::class,'index']);
Route::get('/search',[ProductsController::class,'searchProductByName']);
Route::get('/assets',[HomeController::class,'assetsDownload']);
Route::get('/search-param', [ProductsController::class, 'getPr']);
