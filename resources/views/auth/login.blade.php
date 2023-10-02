<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('dashboard') }}/assets/images/logo.svg">
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
                <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    <h4>Hello!
                        let's get started
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
                            <input type="email" name="email" id="inputEmail" class="form-control"
                                placeholder="Email address" required="" autofocus="">

                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="inputPassword"
                                class="form-control" placeholder="Password" required="">

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
