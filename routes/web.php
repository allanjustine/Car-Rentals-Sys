<?php

use App\Http\Controllers\RenterController;
use App\Http\Controllers\CarDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'home']);

Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);
Route::post('/register',[SiteController::class, 'register']);
Route::get('/register',[SiteController::class, 'registerForm']);

Route::group(['middleware'=>'auth'], function(){

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/users/create',[UserController::class,'create']);
    Route::post('/users',[UserController::class, 'store']);
    Route::get('/users', [UserController::class,'index']);

    Route::get('/renters/create', [RenterController::class,'create']);
    Route::get('/renters/edit/{id}', [RenterController::class,'edit']);
    Route::get('/renters/delete/{id}', [RenterController::class,'delete']);
    Route::get('/renters/view/{id}', [RenterController::class,'view']);
    Route::delete('/renters/{renter}', [RenterController::class,'destroy']);
    Route::put('/renters/{renter}', [RenterController::class,'update']);
    Route::get('/renters', [RenterController::class,'index']);
    Route::post('/renters', [RenterController::class,'store']);

    Route::get('/car-details/create', [CarDetailController::class,'create']);
    Route::get('/car-details/edit/{id}', [CarDetailController::class,'edit']);
    Route::put('/car-details/{carDetail}', [CarDetailController::class,'update']);
    Route::get('/car-details/delete/{id}', [CarDetailController::class,'delete']);
    Route::delete('/car-details/{carDetail}', [CarDetailController::class,'destroy']);
    Route::get('/car-details', [CarDetailController::class,'index']);
    Route::post('/car-details', [CarDetailController::class,'store']);
});


