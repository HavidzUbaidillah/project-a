<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\GenderController;
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
Route::get('/gender', function () {
    return view('input_kategori');
});
Route::get('/event', function () {
    return view('event');
});
Route::post('kategori',[CategoriesController::class,'store'])->name('kategori');
Route::post('/subCat',[SubCategoriesController::class,'store'])->name('subcat');
Route::post('event', [EventsController::class,'store'])->name('event');
Route::post('gender',[GenderController::class,'store'])->name('gender');

