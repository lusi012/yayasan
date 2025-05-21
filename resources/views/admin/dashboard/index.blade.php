@extends('admin.layout.main')
@section('title', 'Dashboard')
@section('content')
    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Dashboard</div>
            </h1>

            <!-- Statistik Hari & Bulan -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-primary">
                            <i class="ion ion-person"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Hari Ini</h4>
                            </div>
                            <div class="card-body">
                                {{ $todayVisitors }} Pengunjung
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-danger">
                            <i class="ion ion-ios-paper-outline"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Bulan Ini</h4>
                            </div>
                            <div class="card-body">
                                {{ $monthVisitors ?? 0 }} Pengunjung
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Pengunjung Per Bulan -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Data Pengunjung</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="monthlyChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js "></script>

    <!-- Script Chart -->
    <script>
        const ctx = document.getElementById('monthlyChart').getContext('2d');
        const monthlyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: 'Pengunjung Per Bulan',
                    data: {{ json_encode($chartData) }},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(54, 162, 235, 1)"
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    </script>
@endsection
