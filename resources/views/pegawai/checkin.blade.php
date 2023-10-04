@extends('pegawai.layouts')
@section('content')
    <div class="container-scroller">
        <div class="container-fluid">
            <div class="row w-100 mx-0">
                <div class="card col-lg-4 mx-auto shadow-sm">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            {{-- <img src="{{ asset('dashboard') }}/images/logo.svg" alt="logo"> --}}
                        </div>
                        <div class="row" style="margin-top: 70px">
                            <div class="col">
                                <input type="hidden" name="" id="lokasi">
                                <div class="webcam-capture"></div>
                            </div>
                        </div>
                        <div class="mt-2">
                            @foreach ($presensi as $item)
                            @endforeach
                            @if ($cek != null)
                                @if ($item->jam_out == null)
                                    <button id="takeabsen" class="btn btn-sm mb-3 btn-danger col col-12">Absen
                                        Keluar</button>
                                @else
                                    <button class="btn btn-sm mb-3 btn-success col col-12">Silahkan Absen kembali besok!</button>
                                @endif
                            @else
                                <button id="takeabsen" class="btn btn-sm mb-3 btn-primary col col-12">Absen Masuk</button>
                            @endif
                        </div>
                        <div class="mt-1" id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endsection

@push('script')
    <script>
        Webcam.set({
            height: 480,
            width: 640,
            image_format: 'jpg',
            jpg_quality: 80
        });

        Webcam.attach('.webcam-capture');

        var lokasi = document.getElementById('lokasi');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }

        function successCallback(position) {
            lokasi.value = position.coords.latitude + ',' + position.coords.longitude;
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 15);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);

        }

        function errorCallback() {

        }

        $("#takeabsen").click(function(e) {
            Webcam.snap(function(uri) {
                image = uri;
            })
            var lokasi = $("#lokasi").val();
            $.ajax({
                type: 'POST',
                url: '/presensi/store',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi
                },
                cache: false,
                success: function(respond) {
                    var status = respond.split("|")
                    if (status[0] == "success") {
                        Swal.fire({
                            title: 'Berhasil',
                            text: status[1],
                            icon: 'success',
                        });
                        setTimeout("location.href='/home'", 2000);
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Maaf Gagal Absen',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        })
    </script>
@endpush
