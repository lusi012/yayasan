<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }
    public function gambar(){
        return view('gambar');
    }
    public function informasi(){
        return view('informasi');
    }
    public function contact(){
        return view('contact');
    }
}
