@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-map-marker-alt"></i> {{ __('تتبع الجمال') }}</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">{{ __('خريطة تتبع الجمال') }}</h3>
                    <div id="map" style="height: 500px; width: 100%; border-radius: 10px;"></div>
                </div>
            </div>
        </div>
    </main>

    @push('js')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

        <script>
            var map = L.map('map').setView([24.774265, 46.738586], 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            var camelMarkers = {};
            var camelIcons = {
                'default': L.icon({ iconUrl: '{{asset('logo.png')}}', iconSize: [40, 40] }),
                'fast': L.icon({ iconUrl: '/assets/camel_fast.png', iconSize: [40, 40] }),
                'slow': L.icon({ iconUrl: '/assets/camel_slow.png', iconSize: [40, 40] })
            };

            var camels = @json($camels);

            camels.forEach(camel => {
                if (camel.gps_location) {
                    var iconType = camel.speed > 5 ? 'fast' : camel.speed < 2 ? 'slow' : 'default';
                    var marker = L.marker([camel.gps_location.latitude, camel.gps_location.longitude], { icon: camelIcons[iconType] })
                        .addTo(map)
                        .bindPopup(`<b>${camel.name}</b><br>رقم الجمل: ${camel.tag_number}`);
                    camelMarkers[camel.id] = marker;
                }
            });
            function updateCamelPositions() {
                fetch("{{ route('owner.track_camels.data') }}")
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(camel => {
                            if (camelMarkers[camel.id]) {
                                var newLatLng = new L.LatLng(camel.gpsLocation.latitude, camel.gpsLocation.longitude);
                                camelMarkers[camel.id].setLatLng(newLatLng);
                            }
                        });
                    });
            }
            setInterval(updateCamelPositions, 5000);
        </script>
    @endpush
@endsection
