<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LupapasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Userumum\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Userumum\GambarController;
// use App\Http\Controllers\Userumum\InformasisController;

// Route umum yang bisa diakses semua orang
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gambar', [GambarController::class, 'index'])->name('gambar');
Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/informasi/{id}', [HomeController::class, 'detail'])->name('informasi.detail');




// Login routes
Route::get('/login', [LoginController::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('/loginproses', [LoginController::class, 'login'])->name('admin.loginproses');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

//lupa password
Route::get('/lupa-password', [LupapasswordController::class,'index'])->name('auth.lupapassword');
Route::post('/lupapasswordproses', [LupapasswordController::class, 'lupapassword'])->name('admin.lupapasswordproses');


// Protected routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
    Route::post('/admin/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::delete('/admin/galeri/{id_galeri}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    Route::put('/admin/galeri/{id_galeri}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::put('/admin/galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');


    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('admin.informasi.index');
    Route::post('/admin/informasi-add', [InformasiController::class, 'store'])->name('admin.informasi.store');
    Route::delete('/admin/informasi/{id_informasi}', [InformasiController::class, 'destroy'])->name('admin.informasi.destroy');
    Route::put('/admin/informasi/{id}', [InformasiController::class, 'update'])->name('admin.informasi.update');
    Route::put('/admin/informasi/{id_informasi}', [InformasiController::class, 'update'])->name('admin.informasi.update');

});
