<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index(){
    //     return view('admin.dashboard.index');
    // }

public function index()
{
    $todayVisitors = Visitor::whereDate('created_at', Carbon::today())
        ->whereIn('url', [
            url('/'),
            url('/gambar'),
            url('/informasi'),
            url('/contact'),
        ])
     
        ->count('ip_address');

    $monthVisitors = Visitor::whereMonth('created_at', Carbon::now()->month)
        ->whereIn('url', [
            url('/'),
            url('/gambar'),
            url('/informasi'),
            url('/contact'),
        ])

        ->count('ip_address');

    return view('admin.dashboard.index', compact('todayVisitors', 'monthVisitors'));
}

}
