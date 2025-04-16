@extends('admin.layout.main')
@section('title', 'Dashboard')
@section('content')
    <div class="main-content">
        <section class="section">
            <h1 class="section-header">
                <div>Dashboard</div>
            </h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-primary">
                            <i class="ion ion-person"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Hari</h4>
                            </div>
                            <div class="card-body">
                                10 
                                Penggunjung
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="card card-sm-3">
                        <div class="card-icon bg-danger">
                            <i class="ion ion-ios-paper-outline"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Bulan</h4>
                            </div>
                            <div class="card-body">
                                42 
                                Penggunjung
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">

                            <h4>Statistics</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="158"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <small class="text-muted"><span class="text-primary"><i
                                                class="ion-arrow-up-b"></i></span> 7%</small>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <small class="text-muted"><span class="text-danger"><i
                                                class="ion-arrow-down-b"></i></span> 23%</small>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <small class="text-muted"><span class="text-primary"><i
                                                class="ion-arrow-up-b"></i></span>9%</small>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <small class="text-muted"><span class="text-primary"><i
                                                class="ion-arrow-up-b"></i></span> 19%</small>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
