<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\productApiController;
use App\Http\Controllers\Api\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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
// Route::post('/add/product',[productApiController::class,'insert']);
// Route::get('/product/all',[productApiController::class,'index']);
// Route::get('/store/all',[productApiController::class,'AllSto']);
// Route::post('/register', [ApiAuthController::class, 'register']);
// Route::post('/login', [ApiAuthController::class, 'login']);
// Route::post('/logout', [ApiAuthController::class, 'logout']);
// Route::delete('/destroy/{id}',[productApiController::class,'destroy']);
Route::middleware("localization")->group(function () {
Route::resource('/products',productApiController::class);
Route::resource('/stores', StoreController::class);
Route::resource('/categories',CategoryController::class);
// Route::get('search/{name?}',[CategoryController::class,'search']);
// Route::get('search/product/{name}',[productApiController::class,'search']);
Route::get('search/{param?}',[StoreController::class,'search']);
Route::post('/pay',[productApiController::class,'SingleCharge'])->name('products.pay');
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [ApiAuthController::class, 'login']);
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
    Route::post('/refresh', [ApiAuthController::class, 'refresh']);
    Route::get('/user-profile', [ApiAuthController::class, 'userProfile']);
});

