<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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

Route::apiResource('genders', GenderController::class);
Route::apiResource('home', HomeController::class);
Route::get('/assets',[HomeController::class,'assetsDownload']);
Route::get('/produk',[ProductsController::class,'index']);
Route::post('/admin-login', LoginController::class);
Route::get('/search-products',[ProductsController::class,'searchProductByName']);

