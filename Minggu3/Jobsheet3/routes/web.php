<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KetegoriController;
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
    return view('welcome');
});

Route::get('/', [HomeController::class, 'Home'])->name('Home');

Route::prefix('category')->group(function(){ 
    Route::get('/baby-kid', [ProductController::class, 'babyKid']); 
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']); 
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);  
    Route::get('/home-care', [ProductController::class, 'homeCare']); 
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'User']);

Route::get('/sales', [SalesController::class, 'sales']);

Route::get('/level', [LevelController::class, 'index']);

Route::get('/kategori', [KetegoriController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);