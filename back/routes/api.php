<?php

use App\Http\Controllers\Api\AllergenController;
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\IngredientController;
use App\Http\Controllers\Api\KitchenOrderController;
use App\Http\Controllers\Api\OnlineOrderController;
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

Route::controller(AllergenController::class)->prefix('allergen')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/name/{name}','findByName');
    Route::get('/description/{description}','findByDescription');
    Route::get('/risk/{risk}','findByRisk');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});

Route::controller(BoardController::class)->prefix('board')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/available/{available}','findByAvailability');
    Route::get('/capacity/{capacity}','findByCapacity');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});

Route::controller(BookingController::class)->prefix('booking')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/name/{name}','findByBookerName');
    Route::get('/phone/{phone}','findByBookerPhone');
    Route::get('/email/{email}','findByBookerEmail');
    Route::get('/people-quantity/{people-quantity}','findByPeopleQuantity');
    Route::get('/date/{date}','findByDate');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});


Route::controller(CustomerController::class)->prefix('customer')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/name/{name}','findByName');
    Route::get('/surname/{surname}','findBySurname');
    Route::get('/birth-date/{birth-date}','findByBirthDate');
    Route::get('/phone/{phone}','findByPhone');
    Route::get('/email/{email}','findByEmail');
    Route::get('/address/{address}','findByAddress');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});


Route::controller(EmployeeController::class)->prefix('employee')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/name/{name}','findByName');
    Route::get('/surname/{surname}','findBySurname');
    Route::get('/team/{team}','findByTeam');
    Route::get('/phone/{phone}','findByPhone');
    Route::get('/email/{email}','findByEmail');
    Route::get('/work-shift/{work-shift}','findByWorkShift');
    Route::get('/bank-account/{bank-account}','findByBankAccount');
    Route::get('/address/{address}','findByAddress');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});


Route::controller(IngredientController::class)->prefix('ingredient')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/name/{name}','findByName');
    Route::get('/quantity/{quantity}','findByQuantity');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});


Route::controller(KitchenOrderController::class)->prefix('kitchen-order')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/begin-date/{begin-date}','findByBeginDate');
    Route::get('/status/{status}','findByStatus');
    Route::get('/end-date/{end-date}','findByEndDate');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});


Route::controller(OnlineOrderController::class)->prefix('online-order')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/amount/{amount}','findByAmount');
    Route::get('/date/{date}','findByDate');
    Route::get('/expected-date/{expected-date}','findByExpectedDate');
    Route::get('/address/{address}','findByAddress');
    Route::get('/status/{status}','findByStatus');
    Route::get('/type/{type}','findByType');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});


Route::controller(ProductController::class)->prefix('products')->group(function(){
    Route::get('/','index');
    Route::post('/','store');
    Route::post('/{id}','update');
    Route::patch('/{id}','patch');
    Route::get('/{id}','show');
    Route::get('/name/{name}','findByName');
    Route::get('/price/{price}','findByPrice');
    Route::get('/available/{available}','findByAvailable');
    Route::get('/image-path/{image-path}','findByImagePath');
    Route::get('/description/{description}','findByDescription');
    Route::get('/type/{type}','findByType');
    Route::get('/all/{value}','findByAllColumns');
    Route::delete('/{id}','destroy');
});
