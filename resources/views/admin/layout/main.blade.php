<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>@yield('title', 'Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('tmp_admin/dist/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tmp_admin/dist/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('tmp_admin/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('tmp_admin/dist/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('tmp_admin/dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tmp_admin/dist/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('tmp_admin/dist/css/style.css') }}">

    <!-- Link CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link JS Bootstrap 5 (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="ion ion-navicon-round"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="ion ion-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i class="ion ion-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg">
                            <i class="ion ion-android-person d-lg-none"></i>
                            <div class="d-sm-none d-lg-inline-block">Administrator</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile.html" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Profile
                            </a>
                            <a href="#" class="dropdown-item has-icon">
                                <i class="ion ion-log-out"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">

                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                            {{-- Mauskan logo disini --}}
                            <img alt="image" src="{{ asset('tmp_admin/logo/logo1.jpg') }}">
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name" style="font-size:20px; font-weight: bold; color: black;">LPKS
                            </div>
                            <div class="user-role" style="font-size:12px; font-weight: bold; color: black;">
                                YAYASAN CAHAYA AYU
                            </div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu</li>
                        <li class="active">
                            <a href="{{ route('admin.dashboard') }}"><i class="ion ion-speedometer"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.gambar') }}"><i class="ion ion-images"></i> <span>Galeri</span></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.informasi') }}"><i class="ion ion-information-circled"></i>
                                <span>Informasi</span></a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="ion ion-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>


                    </ul>

                </aside>
            </div>
            {{-- start content --}}
            @yield('content')
            {{-- end content --}}
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <span id="year"></span>
                    <div class="bullet"></div> Design By
                    <a href="#">Bikin sendiri</a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin logout?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('tmp_admin/dist/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/modules/popper.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/modules/tooltip.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/js/sa-functions.js') }}"></script>

    <script src="{{ asset('tmp_admin/dist/modules/chart.min.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/modules/summernote/summernote-lite.js') }}"></script>



    <script>
        document.getElementById("year").textContent = new Date().getFullYear();
    </script>

    {{-- <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus"],
                datasets: [{
                    label: 'Statistics',
                    data: [460, 458, 330, 502, 430, 610, 488],
                    borderWidth: 2,
                    backgroundColor: 'rgb(87,75,144)',
                    borderColor: 'rgb(87,75,144)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script> --}}
    <script src="{{ asset('tmp_admin/dist/js/scripts.js') }}"></script>
    <script src="{{ asset('tmp_admin/dist/js/custom.js') }}"></script>



</body>

</html>
