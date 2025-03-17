<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
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

Route::get('/home', [HomeController::class, 'Home'])->name('Home');

Route::prefix('category')->group(function(){ 
    Route::get('/baby-kid', [ProductController::class, 'babyKid']); 
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']); 
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);  
    Route::get('/home-care', [ProductController::class, 'homeCare']); 
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'User']);

Route::get('/sales', [SalesController::class, 'sales']);

Route::get('/level', [LevelController::class, 'index']);

Route::get('/User', [UserController::class, 'index']);

Route::get('User/tambah', [UserController::class, 'tambah']);

Route::post('User/tambah_simpan', [UserController::class, 'tambah_simpan']);

Route::get('/User/ubah/{id}', [UserController::class, 'ubah']);

Route::put('/User/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);

Route::get('User/hapus/{id}', [UserController::class, 'hapus']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/kategori/create', [KategoriController::class, 'create']);

Route::post('/kategori', [KategoriController::class, 'store']);

Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);

Route::put('/kategori/{id}', [KategoriController::class, 'update']);

Route::delete('/kategori/{id}', [KategoriController::class, 'delete']);