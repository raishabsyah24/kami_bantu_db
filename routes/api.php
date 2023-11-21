<?php

use App\Http\Controllers\api\LaundryController;
use App\Http\Controllers\api\PromoController;
use App\Http\Controllers\api\ShopController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/promo', [PromoController::class, 'readAll']);
Route::get('/shop', [ShopController::class, 'readAll']);
Route::get('/laundry', [LaundryController::class, 'readAll']);
Route::get('/user', [UserController::class, 'readAll']);


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    //promo
    Route::get('/promo/limit', [PromoController::class, 'readLimit']);

    //shop
    Route::get('/shop/recomendation/limit', [ShopController::class, 'readRecomendationLimit']);
    Route::get('/shop/search/city/{name}', [ShopController::class, 'searchBycity']);

    //laundry
    Route::get('/laundry/user/{Id}', [LaundryController::class, 'whereUserId']);
    Route::post('/laundry/claim', [LaundryController::class, 'claim']);
});
