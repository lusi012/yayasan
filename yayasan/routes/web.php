<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Userumum\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('home');
// });

// //halaman pengguna umum
// Route::get('/gambar', function () {
//     return view('gambar');
// });

// //halaman admin
// Route::get('/adminn', function () {
//     return view('adminn.dashboard');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gambar', [HomeController::class, 'gambar'])->name('gambar');
Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


Route::get('/login', [LoginController::class, 'index'])->name('admin.login');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');


Route::get('/admin/gambar', [GaleriController::class, 'index'])->name('admin.gambar');


Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('admin.informasi');
