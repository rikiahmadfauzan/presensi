@extends('pegawai.layouts')
@section('content')
    <section>
        <main id="main">
            <div class="row" style="margin-top: 70px">
                <div class="col">
                    <input type="hidden" name="" id="lokasi">
                    <div class="webcam-capture"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button id="takeabsen" class="btn btn-primary btn-block">Absen Masuk</button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="map"></div>
                </div>
            </div>
        </main>
    </section>
    <style>
        .webcam-capture,
        .webcam-capture video {
            display: inline-block;
            width: 100% !important;
            margin: auto;
            height: auto !important;
            border-radius: 15px;

        }

        #map {
            height: 200px;
        }
    </style>
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
                maxZoom: 20,
                attribution: '© OpenStreetMap'
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
                success:function(respond){
                    if(respond == 0 ){
                        alert('success');
                    }else{
                        alert('error');
                    }
                }
            });
        })
    </script>
@endpush
