<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WellcomeController;
use App\Http\Controllers\PhotoController;


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
//1
Route::get('/world', function (){
    return 'World';
});
Route::get('/welcome', function (){
    return 'Selamat Datang';
});
Route::get('/identitas', function (){
    return 'NIM:2341760073<br> Nama:Bayu Triwibowo';
});


//2
Route::get('/user/{name}', function ($name){
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function($postID, $commentID){
    return 'Pos ke-' .$postID. " komentar ke-: " .$commentID;
});


//3
Route::get('/user/{name?}', function ($name=null){
    return 'Nama saya '.$name;
});
Route::get('/user/{name?}', function ($name='John'){
    return 'Nama saya '.$name;
});

//controller
Route::get('/hello', [WellcomeController::class,'hello']);

// cobalah membuat route ’/’ yang menampilkan pesan ‘Selamat Datang’.
Route::get('/', [PageController::class,'index']);

//buatlah route ‘/about’ yang akan menampilkan NIM dan nama Anda.
Route::get('/about', [PageController::class,'about']);

//buatlah route /articles/{id} yang akan menampilkan output “Halaman Artikel dengan ID {id}”
Route::get('/articles/{id}', [PageController::class, 'articles']);

//resource controller
route::resource('photos', PhotoController::class);
    
//view

Route::get('/greeting', function () {
    return view('blog.Hello', ['name' => 'Bayu']);
});

Route::get('/greeting', [WellcomeController::class, 'greeting']);