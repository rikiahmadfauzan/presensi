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
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/select2.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/dropzone.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/uppy.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/jquery.steps.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/jquery.timepicker.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/min.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/app-dark.css" id="darkTheme" disabled>


    {{-- map --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <style>
            .nav-link.active
             {
                background-color: #e9ecef;
                border-radius: 0.25rem;
            }

        </style>

</head>

<body class="vertical light" onload="realtimeClock()">
    <div class="wrapper">
        <nav class="topnav navbar navbar-light">
            <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                <i class="fe fe-menu navbar-toggler-icon"></i>
            </button>
        </nav>
        <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
            <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
                data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <nav class="vertnav navbar navbar-light">
                <!-- nav bar -->
                {{-- <img src="{{ asset('dashboard') }}/assets/images/logo.png" width="300" height="100" alt="logo"> --}}

                <div class="w-100 mb-4 d-flex">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                </div>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item">
                        <a href="/home" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                            <i class="fe fe-home fe-16"></i>
                            <span class="ml-3 item-text">Home</span><span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
                <p class="text-muted nav-heading mt-4 mb-1">
                    <span>Page</span>
                </p>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100">
                        <a class="nav-link {{ Request::is('data*') ? 'active' : '' }}" href="/data">
                            <i class="fe fe-check-circle fe-16"></i>
                            <span class="ml-3 item-text">Presence</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link {{ Request::is('profil*') ? 'active' : '' }}" href="/profil">
                            <i class="fe fe-user fe-16"></i>
                            <span class="ml-3 item-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item w-100">
                        <a class="nav-link" href="/logout">
                            <i class="fe fe-log-out fe-16"></i>
                            <span class="ml-3 item-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        @yield('content')

    </div> <!-- .wrapper -->

    {{-- map --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"
    integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{ asset('dashboard') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/map.js"></script>
    <script src="{{ asset('dashboard') }}/js/jam.js"></script>
    <script src="{{ asset('dashboard') }}/js/webcam.js"></script>
    <script src="{{ asset('dashboard') }}/js/popper.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/moment.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/simplebar.min.js"></script>
    <script src='{{ asset('dashboard') }}/js/daterangepicker.js'></script>
    <script src='{{ asset('dashboard') }}/js/jquery.stickOnScroll.js'></script>
    <script src="{{ asset('dashboard') }}/js/tinycolor-min.js"></script>
    <script src="{{ asset('dashboard') }}/js/config.js"></script>
    <script src="{{ asset('dashboard') }}/js/d3.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/topojson.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/datamaps.all.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/datamaps-zoomto.js"></script>
    <script src="{{ asset('dashboard') }}/js/datamaps.custom.js"></script>
    <script src="{{ asset('dashboard') }}/js/Chart.min.js"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('dashboard') }}/js/gauge.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/jquery.sparkline.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/apexcharts.min.js"></script>
    <script src="{{ asset('dashboard') }}/js/apexcharts.custom.js"></script>
    <script src='{{ asset('dashboard') }}/js/jquery.mask.min.js'></script>
    <script src='{{ asset('dashboard') }}/js/select2.min.js'></script>
    @stack('script')
    <script src='{{ asset('dashboard') }}/js/jquery.steps.min.js'></script>
    <script src='{{ asset('dashboard') }}/js/jquery.validate.min.js'></script>
    <script src='{{ asset('dashboard') }}/js/jquery.timepicker.js'></script>
    <script src='{{ asset('dashboard') }}/js/dropzone.min.js'></script>
    <script src='{{ asset('dashboard') }}/js/uppy.min.js'></script>
    <script src='{{ asset('dashboard') }}/js/quill.min.js'></script>
    <script>

        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });
        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);
        cb(start, end);
        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });
        // editor
        var editor = document.getElementById('editor');
        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                        'header': 1
                    },
                    {
                        'header': 2
                    }
                ],
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                [{
                        'script': 'sub'
                    },
                    {
                        'script': 'super'
                    }
                ],
                [{
                        'indent': '-1'
                    },
                    {
                        'indent': '+1'
                    }
                ], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction
                [{
                        'color': []
                    },
                    {
                        'background': []
                    }
                ], // dropdown with defaults from theme
                [{
                    'align': []
                }],
                ['clean'] // remove formatting button
            ];
            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        var uptarg = document.getElementById('drag-drop-area');
        if (uptarg) {
            var uppy = Uppy.Core().use(Uppy.Dashboard, {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus, {
                endpoint: 'https://master.tus.io/files/'
            });
            uppy.on('complete', (result) => {
                console.log('Upload complete! We’ve uploaded these files:', result.successful)
            });
        }
    </script>
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
