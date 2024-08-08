<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\homeBannerController;
use App\Http\Controllers\Admin\brandController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\sizeController;
use App\Http\Controllers\Admin\colorController;
use App\Http\Controllers\Admin\attributeController;
use App\Http\Controllers\Admin\categoryController;
Route::get('/dashboard', function () {
    return view('admin/index');
});

//profile
Route::get('/profile',[profileController::class,'index']);
Route::post('/saveProfile',[profileController::class,'store']);

// home banner
Route::get('/home_banner',[homeBannerController::class,'index']);
Route::post('/updateHomeBanner',[homeBannerController::class,'store']);

// manage size
Route::get('/manage_size',[sizeController::class,'index']);
Route::post('/updateSize',[sizeController::class,'store']);

// manage color
Route::get('/manage_color',[colorController::class,'index']);
Route::post('/updateColor',[colorController::class,'store']);

//Attributes
Route::get('/attribute_name',[attributeController::class,'index_attribute_name']);
Route::post('/update_attribute_name',[attributeController::class,'store_attribute_name']);

//Attributes value
Route::get('/attribute_value',[attributeController::class,'index_attribute_value']);
Route::post('/update_attribute_value',[attributeController::class,'store_attribute_value']);

//Category
Route::get('/category',[categoryController::class,'index']);
Route::post('/updateCategory',[categoryController::class,'store']);

//Category
Route::get('/category_attribute',[categoryController::class,'index_category_attribute']);
Route::post('/update_category_attribute',[categoryController::class,'store_category_attribute']);

// brand
Route::get('/brand',[brandController::class,'index']);
Route::post('/updateBrand',[brandController::class,'store']);

// delete data
Route::get('/deleteData/{id?}/{table?}',[dashboardController::class,'deleteData']);
