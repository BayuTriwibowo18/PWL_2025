<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'Selamat Datang';
    }

    public function about(){
        return 'NIM: 2341760073<br>Nama: Bayu Triwibowo';
    }

    public function articles($articlesId){
        return 'Halaman artikel dengan ID '.$articlesId;
    }
}
