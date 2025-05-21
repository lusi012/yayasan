<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DashboardController extends Controller
{
   public function index()
{
    // Ambil APP_URL dari .env → config/app.php
    $baseUrl = rtrim(Config::get('app.url'), '/');

    // Valid URLs
    $validUrls = [
        $baseUrl . '/',
        $baseUrl . '/gambar',
        $baseUrl . '/informasi',
        $baseUrl . '/contact',
    ];

    // Pengunjung hari ini
    $today = Carbon::now()->startOfDay();
    $todayVisitors = Visitor::where('created_at', '>=', $today)
        ->whereIn('url', $validUrls)
        ->distinct()
        ->count('ip_address');

    // Pengunjung bulan ini
    $monthVisitors = Visitor::whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->whereIn('url', $validUrls)
        ->distinct()
        ->count('ip_address');

    // Data pengunjung per bulan (untuk chart)
    $visitorsPerMonth = Visitor::selectRaw('MONTH(created_at) as month, COUNT(DISTINCT ip_address) as total')
        ->whereYear('created_at', Carbon::now()->year)
        ->whereIn('url', $validUrls)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Siapkan array default 12 bulan bernilai 0
    $chartData = array_fill(0, 12, 0);

    foreach ($visitorsPerMonth as $data) {
        $chartData[$data->month - 1] = $data->total; // karena bulan mulai dari 1-12
    }

    return view('admin.dashboard.index', compact(
        'todayVisitors',
        'monthVisitors',
        'chartData'
    ));
}
}
