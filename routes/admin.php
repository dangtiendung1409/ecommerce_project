<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\homeBannerController;
Route::get('/dashboard', function () {
    return view('admin/index');
});

//profile
Route::get('/profile',[profileController::class,'index']);
Route::post('/saveProfile',[profileController::class,'store']);

// home banner
Route::get('/home_banner',[homeBannerController::class,'index']);
