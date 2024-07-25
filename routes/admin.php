<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\homeBannerController;
use App\Http\Controllers\Admin\dashboardController;
Route::get('/dashboard', function () {
    return view('admin/index');
});

//profile
Route::get('/profile',[profileController::class,'index']);
Route::post('/saveProfile',[profileController::class,'store']);

// home banner
Route::get('/home_banner',[homeBannerController::class,'index']);
Route::post('/updateHomeBanner',[homeBannerController::class,'store']);
Route::get('/deleteData/{id?}/{table?}',[dashboardController::class,'deleteData']);
