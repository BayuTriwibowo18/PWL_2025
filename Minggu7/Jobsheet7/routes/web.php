<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [HomeController::class, 'home']) -> name('home');

Route::prefix('category')->group(function(){
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'user']);
Route::get('/sales', [SalesController::class, 'sales']);
Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, "hapus"]);

Route::pattern('id', '[0-9]+');                                                         // Artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'PostRegister']);

Route::middleware(['auth'])->group(function(){                                          // Semua Route yang ada di gropu harus login dahulu
    Route::get('/', [WelcomeController::class, 'index']);

    Route::group(['prefix' => 'user'], function () {
        Route::middleware(['authorize:ADM'])->group(function (){
            Route::get('/', [UserController::class, 'index']);                              // menampilkan halaman awal user
            Route::post('/list', [UserController::class, 'list']);                          // menampilkan data user dalam bentuk json untuk datatables
            Route::get('/create', [UserController::class, 'create']);                       // menampilkan halaman form tambah user
            Route::post('/', [UserController::class, 'store']);                             // menyimpan data user baru
            Route::get('/create_ajax', [UserController::class, 'create_ajax']);             // menampilkan halaman form tambah user Ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']);                    // menyimpan data user baru Ajax
            Route::get('/{id}', [UserController::class, 'show']);                           // menampilkan detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']);                      // menampilkan halaman form edit user
            Route::put('/{id}', [UserController::class, 'update']);                         // menyimpan perubahan data user
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);            // menampilkan halaman form edit user AJax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);        // menyimpan perubahan data user Ajax
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);       // untuk tampilkan form confirm delete user Ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);     // untuk hapus data user Ajax
            Route::delete('/{id}', [UserController::class, 'destroy']);                     // menghapus data user
        });
    });
    
    Route::group(['prefix' => 'level'], function () {
        Route::middleware(['authorize:ADM'])->group(function () {
            Route::get('/', [LevelController::class, 'index']);       
            Route::post('/list', [LevelController::class, 'list']);    
            Route::get('/create', [LevelController::class, 'create']); 
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']);             
            Route::post('/ajax', [LevelController::class, 'store_ajax']);   
            Route::get('/{id}', [LevelController::class, 'show']);     
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);           
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);       
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);       
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);   
            Route::delete('/{id}', [LevelController::class, 'destroy']);
        });
    });
    
    Route::group(['prefix' => 'kategori'], function () {
        Route::middleware(['authorize:ADM,MNG'])->group(function (){
            Route::get('/', [KategoriController::class, 'index']);       
            Route::post('/list', [KategoriController::class, 'list']);    
            Route::get('/create', [KategoriController::class, 'create']); 
            Route::post('/', [KategoriController::class, 'store']);
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);             
            Route::post('/ajax', [KategoriController::class, 'store_ajax']);    
            Route::get('/{id}', [KategoriController::class, 'show']);     
            Route::get('/{id}/edit', [KategoriController::class, 'edit']);
            Route::put('/{id}', [KategoriController::class, 'update']); 
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);           
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);       
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);       
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);     
            Route::delete('/{id}', [KategoriController::class, 'destroy']);
        });
    });
    
    Route::group(['prefix' => 'stok'], function () {
        Route::middleware(['authorize:ADM,MNG,STF'])->group(function (){
            Route::get('/', [StokController::class, 'index']);       
            Route::post('/list', [StokController::class, 'list']);    
            Route::get('/create', [StokController::class, 'create']); 
            Route::post('/', [StokController::class, 'store']);
            Route::get('/create_ajax', [StokController::class, 'create_ajax']);             
            Route::post('/ajax', [StokController::class, 'store_ajax']);    
            Route::get('/{id}', [StokController::class, 'show']);     
            Route::get('/{id}/edit', [StokController::class, 'edit']);
            Route::put('/{id}', [StokController::class, 'update']);   
            Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);           
            Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);       
            Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);       
            Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);   
            Route::delete('/{id}', [StokController::class, 'destroy']);
        });
    });
    
    Route::group(['prefix' => 'barang'], function () {
        Route::middleware(['authorize:ADM,MNG'])->group(function (){
            Route::get('/', [BarangController::class, 'index']);       
            Route::post('/list', [BarangController::class, 'list']);    
            Route::get('/create', [BarangController::class, 'create']); 
            Route::post('/', [BarangController::class, 'store']);  
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']);             
            Route::post('/ajax', [BarangController::class, 'store_ajax']);  
            Route::get('/{id}', [BarangController::class, 'show']);     
            Route::get('/{id}/edit', [BarangController::class, 'edit']);
            Route::put('/{id}', [BarangController::class, 'update']);   
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);           
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);       
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);       
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);   
            Route::delete('/{id}', [BarangController::class, 'destroy']);
        });
    });

});