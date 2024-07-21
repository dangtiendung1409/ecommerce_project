<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\profileController;

Route::get('/dashboard', function () {
    return view('admin/index');
});

Route::get('/profile',[profileController::class,'index']);
Route::post('/saveProfile',[profileController::class,'store']);
