<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubCategoriesController;
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
//'middleware' => 'auth:api'

Route::middleware('auth:admin')->group(function (){
    Route::get('/login-atemint', LoginController::class);
    Route::post('/insert-event',[EventsController::class,'store']);
    Route::post('/insert-product',[ProductsController::class,'store']);
    Route::post('/insert-subCategory',[SubCategoriesController::class,'store']);
    Route::post('logout-atmint',[LoginController::class, 'logout']);
});

Route::middleware('guest')->group(function (){
    Route::get('/login-atmint', [LoginController::class,'__invoke']);
    Route::get('/new-series',[ProductsController::class,'']);
    Route::get('/new-event',[ProductsController::class,'']);
    Route::get('/new-products',[ProductsController::class,'whatsHot']);
    Route::get('/genders',[]);
    Route::get('/top-series',[]);
    Route::get('/products', [ProductsController::class,'getPr']);
    Route::get('/search-products',[ProductsController::class,'searchProductByName']);
    Route::get('/products-by-search',[ProductsController::class,'getProductByName']);
    Route::get('/product',[ProductsController::class,'getProductById']);
});
Route::apiResource('genders', GenderController::class);
Route::get('/home', [HomeController::class,'index']);
Route::get('/assets','HomeController@assetsDownload');
Route::post('/admin-login', LoginController::class);

