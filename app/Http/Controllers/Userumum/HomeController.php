<?php
namespace App\Http\Controllers\Userumum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('pengguna_umum.home');
    }
    public function gambar(){
        return view('pengguna_umum.gambar');
    }
    public function informasi(){
        return view('pengguna_umum.informasi');
    }
    public function contact(){
        return view('pengguna_umum.contact');
    }
}
