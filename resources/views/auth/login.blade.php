<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('dashboard') }}/favicon.ico">
    <title>Presence</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/app-dark.css" id="darkTheme" disabled>
</head>

<body class="light">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
                <div class="col-lg-4 mx-auto shadow">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        {{-- <div class="brand-logo">
                            <img src="{{ asset('dashboard') }}/assets/images/img.png" width="50" height="80" alt="logo">
                        </div> --}}
                        <h4>Hello!
                            {{-- let's get started --}}
                        </h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="pt-3" action="/proseslogin" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" required="" autofocus="">

                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" required="">

                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-sm mb-3 btn-primary col col-12">SIGN
                                    IN</button>
                            </div>
                            {{-- <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="/register" class="text-primary">Create</a>
                            </div> --}}
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <script src="{{ asset('dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/popper.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/moment.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/simplebar.min.js"></script>
    <script src='{{ asset('dashboard') }}/js/daterangepicker.js'></script>
    <script src='{{ asset('dashboard') }}/js/jquery.stickOnScroll.js'></script>
    <script src="{{ asset('dashboard') }}/js/tinycolor-min.js"></script>
    <script src="{{ asset('dashboard') }}/js/config.js"></script>
    <script src="{{ asset('dashboard') }}/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>
