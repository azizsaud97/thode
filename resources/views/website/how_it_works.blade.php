@extends('website.app')

@section('title', 'كيف يعمل - ذود')

@section('content')

    <!-- Breadcrumb Section -->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>كيف يعمل ذود</h2>
                            <p><a href="{{ url('/') }}">الرئيسية</a> <span>/</span> كيف يعمل</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how_it_works_section py-5">
        <div class="container">
            <div class="section_title text-center mb-5">
                <h2 class="font-weight-bold text-primary">تتبع إبلَك في الوقت الفعلي</h2>
                <p class="text-muted">استخدم نظام Naqti لمراقبة إبلَك على الخريطة في الوقت الفعلي والتنبيه عند خروجها من المنطقة المحددة.</p>
            </div>
            <div id="map" style="height: 500px; border-radius: 10px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);"></div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var map = L.map('map').setView([27.0345, 49.6652], 14); // Zoomed into Jubail

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var camels = [
                { id: 1, name: "الجمل 1", lat: 27.035, lng: 49.662 },
                { id: 2, name: "الجمل 2", lat: 27.032, lng: 49.667 },
                { id: 3, name: "الجمل 3", lat: 27.036, lng: 49.663 }
            ];

            var allowedBounds = [
                [27.030, 49.660], // Bottom-left corner
                [27.040, 49.670]  // Top-right corner
            ];

            var redZone = L.polygon([
                [27.030, 49.660],
                [27.040, 49.660],
                [27.040, 49.670],
                [27.030, 49.670]
            ], {
                color: "red",
                fillColor: "#f03",
                fillOpacity: 0.2
            }).addTo(map);

            var camelMarkers = {};

            camels.forEach(function (camel) {
                var marker = L.marker([camel.lat, camel.lng], { icon: createCamelIcon() }).addTo(map)
                    .bindPopup(`<b>${camel.name}</b><br>الموقع الحالي`);
                camelMarkers[camel.id] = marker;
            });

            function createCamelIcon() {
                return L.icon({
                    iconUrl: "{{ asset('assets/img/camel.gif') }}",
                    iconSize: [40, 40],
                    iconAnchor: [20, 40],
                    popupAnchor: [0, -30]
                });
            }

            function updateCamelPositions() {
                camels.forEach(function (camel) {
                    var newLat = camel.lat + (Math.random() - 0.5) * 0.001;
                    var newLng = camel.lng + (Math.random() - 0.5) * 0.001;

                    camel.lat = newLat;
                    camel.lng = newLng;

                    camelMarkers[camel.id].setLatLng([newLat, newLng])
                        .bindPopup(`<b>${camel.name}</b><br>موقع جديد`);

                    if (
                        newLng < allowedBounds[0][1] || newLng > allowedBounds[1][1] ||
                        newLat < allowedBounds[0][0] || newLat > allowedBounds[1][0]
                    ) {
                        alert(`⚠️ تنبيه: ${camel.name} خرج عن النطاق المحدد!`);
                    }
                });
            }

            setInterval(updateCamelPositions, 5000);
        });
    </script>

    <!-- OpenStreetMap & Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

@endsection
