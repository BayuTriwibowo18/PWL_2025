<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles($articlesId){
        return 'Halaman artikel dengan ID '.$articlesId;
    }
}
