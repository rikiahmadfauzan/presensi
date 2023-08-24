<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/style.css">
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                {{-- <img src="{{ asset('dashboard') }}/images/logo.svg" alt="logo"> --}}
                            </div>
                            <h4>Hello! let's get started</h4>
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
                                    <input type="text" name="nik" value="{{ old('nik') }}"  class="form-control form-control-lg"
                                        id="nik" placeholder="Nik">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-sm mb-3 btn-primary col col-12">SIGN
                                        IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="/register" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('dashboard') }}/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{ asset('dashboard') }}/js/off-canvas.js"></script>
    <script src="{{ asset('dashboard') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('dashboard') }}/js/template.js"></script>
</body>

</html>
