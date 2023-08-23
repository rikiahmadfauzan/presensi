<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pegawai</title>
    <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/mdi/css/materialdesignicons.min.css">

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets') }}/css/styles.css" rel="stylesheet" />
    <link href="{{ asset('dashboard') }}/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/base/vendor.bundle.base.css">
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png" />
    <script src="{{ asset('assets/js/jam.js') }}"></script>
    <script src="{{ asset('assets/js/webcam.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body onload="realtimeClock()">

    <!-- Navigation-->
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand fw-bold fst-italic" href="#!">Enter <span class="text-white">Caffe</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/cafe">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/riwayat">Pesanan</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/allproduct">All Menu</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="/makanan">Food</a></li>
                            <li><a class="dropdown-item" href="/minuman">Drink</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    @yield('content')
    <!-- Footer-->
    {{-- <footer class="py-2 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">
                Copyright &copy; rikiahamadfauzan 2023
            </p>
        </div>
    </footer> --}}
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('dashboard') }}/js/off-canvas.js"></script>
    <script src="{{ asset('dashboard') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('dashboard') }}/js/template.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    @stack('script')
</body>

</html>

