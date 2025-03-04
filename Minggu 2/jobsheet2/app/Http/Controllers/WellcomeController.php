<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    public function hello(){
        return 'Hello World';
    }

    public function greeting(){
        return view('blog.hello')
        ->with('name','Bayu')
        ->with('occupation','Astronaut');
    }
}
