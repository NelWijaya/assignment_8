<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductsController::class)->group(function(){
    Route::get('/product', 'index')->name('getProduct');
    Route::post('/product', 'store')->name('storeProduct');
    Route::get('/product/{id}', 'show')->name('showProduct');
    Route::post('/product/{id}', 'update')->name('updateProduct');
    Route::delete('/product/{id}', 'destroy')->name('destroyProduct');
});
