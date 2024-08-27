<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\auth\authController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('index');
});
Route::get('/loginAdmin', function () {
    return view('auth/signIn');
});

Route::get('/apiDocs', function () {
    return view('apiDocs');
});

Route::post('/login_user',[authController::class,'loginUser']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('login');
});
//Route::get('/createAdmin',[AuthController::class, 'createCustomer']);
