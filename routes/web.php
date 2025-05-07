<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\InformasiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Userumum\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gambar', [HomeController::class, 'gambar'])->name('gambar');
Route::get('/informasi', [HomeController::class, 'informasi'])->name('informasi');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// Login routes
Route::get('/login', [LoginController::class, 'index'])->name('admin.login')->middleware('guest');
Route::post('/loginproses', [LoginController::class, 'login'])->name('admin.loginproses');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Protected routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/gambar', [GaleriController::class, 'index'])->name('admin.gambar');
    Route::post('/admin/gambar-store', [GaleriController::class, 'store'])->name('admin.gambar.store');
    Route::get('/admin/informasi', [InformasiController::class, 'index'])->name('admin.informasi');

});