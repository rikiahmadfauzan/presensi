<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Presensi</title>
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/style.css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    {{-- <link href="{{ asset('assets') }}/css/styles.css" rel="stylesheet" /> --}}
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/images/img.png" />
    {{-- js --}}
    <script src="{{ asset('assets/js/jam.js') }}"></script>
    <script src="{{ asset('assets/js/webcam.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
        integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body onload="realtimeClock()">
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center bg-danger">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <h3 class="navbar-brand brand-logo text-white">Presensi</h3>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-sort-variant text-white"></span>
                    </button>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end bg-danger">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <span class="nav-profile-name text-white">{{ Auth::user()->name }}</span>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu text-white"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profil">
                            <i class="mdi mdi-account menu-icon"></i>
                            <span class="menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/data">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Rekapan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="mdi mdi-logout menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper bg-white py-2">
                    <div class="row">
                        <div class="col-md-12 stretch">
                            @yield('content')
                            {{-- <h5>Selamat Datang {{ Auth::user()->name }}</h5> --}}
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a
                                href="https://www.telkom.co.id/" target="_blank">telkomlembong
                            </a>2023</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ asset('dashboard') }}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('dashboard') }}/js/off-canvas.js"></script>
    @stack('script')

    <script src="{{ asset('dashboard') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('dashboard') }}/js/template.js"></script>
    <script src="{{ asset('dashboard') }}/js/dashboard.js"></script>
    <script src="{{ asset('dashboard') }}/js/data-table.js"></script>
    <script src="{{ asset('dashboard') }}/js/jquery.dataTables.js"></script>
    <script src="{{ asset('dashboard') }}/js/dataTables.bootstrap4.js"></script>
    <script src="{{ asset('dashboard') }}/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="{{ asset('assets') }}/js/scripts.js"></script>




</body>

</html>
