<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\authController;
use App\Http\Controllers\front\HomePageController;
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

Route::post('/auth/login', [authController::class, 'loginUser']);
Route::post('/auth/register', [authController::class, 'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function(Request $request) {
        return $request->user(); });

    Route::post('/updateUser', [authController::class, 'updateUser']);


    Route::post('/auth/logout', function (Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    });
});
// frontend data
Route::get('/getHomeData', [HomePageController::class, 'getHomeData']);
Route::get('/getHeaderCategoriesData', [HomePageController::class, 'getCategoriesData']);
Route::post('/getCategoryData', [HomePageController::class, 'getCategoryData']);
Route::get('/getProductData/{item_code?}/{slug?}', [HomePageController::class, 'getProductData']);
Route::post('/getUserData', [HomePageController::class, 'getUserData']);
Route::post('/getCartData', [HomePageController::class, 'getCartData']);
Route::post('/addToCart', [HomePageController::class, 'addToCart']);
Route::post('/updateCartData', [HomePageController::class, 'updateCartData']);
Route::post('/removeCartData', [HomePageController::class, 'removeCartData']);
Route::post('/addCoupon', [HomePageController::class, 'addCoupon']);
Route::post('/removeCoupon', [HomePageController::class, 'removeCoupon']);
Route::post('/getUserCoupon', [HomePageController::class, 'getUserCoupon']);
Route::post('/getPincodeDetails', [HomePageController::class, 'getPincodeDetails']);
Route::post('/placeOrder', [HomePageController::class, 'placeOrder']);
