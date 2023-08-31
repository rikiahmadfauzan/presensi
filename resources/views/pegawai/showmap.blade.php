<style>
    #map {
        height: 250px;
    }
</style>
<div id="map"></div>
<script>
    var lokasi = "{{ $presensi->lokasi_in }}"
    var lok = lokasi.split(",");
    var latitude = lok[0];
    var longitude = lok[1];
    var map = L.map('map').setView([latitude, longitude], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
    }).addTo(map);
    var marker = L.marker([latitude, longitude]).addTo(map);
    var popup = L.popup()
    .setLatLng([latitude, longitude])
    .setContent("{{ $presensi->name }}")
    .openOn(map);

</script>
