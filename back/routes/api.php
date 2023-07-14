<?php

use App\Http\Controllers\AllergenController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\KitchenOrderController;
use App\Http\Controllers\OnlineOrderController;
use App\Http\Controllers\Api\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AllergenController::class)->prefix('allergens')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});

Route::controller(BoardController::class)->prefix('board')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});

Route::controller(BookingController::class)->prefix('booking')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});


Route::controller(CustomerController::class)->prefix('customer')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});


Route::controller(EmployeeController::class)->prefix('employee')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});


Route::controller(IngredientController::class)->prefix('ingredient')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});


Route::controller(KitchenOrderController::class)->prefix('products')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});


Route::controller(OnlineOrderController::class)->prefix('products')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});


Route::controller(ProductController::class)->prefix('products')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::put('/{id}','put');
    Route::get('/{id}','show');
    Route::delete('/{id}','destroy');
});