<div class="row">
    <div class="form-group col-md-6">
        <label class="text-danger font-weight-bold d-block mb-2">
            ⚠️ يرجى اختيار المالك أولًا لعرض الجمال المرتبطة به
        </label>
    <select name="owner_id" class="form-control select2"
            onchange="window.location.href = '?owner_id=' + this.value">
        <option value="" selected>-- اختر مالكًا --</option>
        @foreach($owners as $owner)
            <option value="{{ $owner->id }}" {{ request('owner_id') == $owner->id ? 'selected' : '' }}>
                {{ $owner->name }} - {{ $owner->civil_registry }}
            </option>
        @endforeach
    </select>
    </div>

    <div class="form-group col-md-6">
        <label>{{ __('الجمل المرتبط') }}</label>
        <select name="camel_id" id="camelSelect" class="form-control select2" required>
            <option value="">اختر الجمل</option>
            @foreach($camels as $camel)
                <option value="{{ $camel->id }}"
                        data-lat="{{ optional($camel->gpsLocation)->latitude }}"
                        data-lng="{{ optional($camel->gpsLocation)->longitude }}"
                    {{ old('camel_id') == $camel->id ? 'selected' : '' }}>
                    {{ $camel->name }} (ID: {{ $camel->id }})
                </option>
            @endforeach
        </select>
    </div>


    <div class="form-group col-md-6">
        <label>{{ __('نوع الجهاز') }}</label>
        <input type="text" name="device_type" class="form-control" value="{{ old('device_type', $trackerDevice->device_type ?? '') }}" required>
    </div>

    <div class="form-group col-md-6">
        <label>{{ __('موديل الجهاز') }}</label>
        <input type="text" name="device_model" class="form-control" value="{{ old('device_model', $trackerDevice->device_model ?? '') }}" required>
    </div>

    <div class="form-group col-md-6">
        <label>{{ __('الإصدار البرمجي') }}</label>
        <input type="text" name="firmware_version" class="form-control" value="{{ old('firmware_version', $trackerDevice->firmware_version ?? '') }}" required>
    </div>

    <div class="form-group col-md-6">
        <label>{{ __('الحالة') }}</label>
        <select name="status" class="form-control">
            <option value="active" {{ isset($trackerDevice) && $trackerDevice->status == 'active' ? 'selected' : '' }}>نشط</option>
            <option value="inactive" {{ isset($trackerDevice) && $trackerDevice->status == 'inactive' ? 'selected' : '' }}>غير نشط</option>
        </select>
    </div>
</div>

<hr>

<h4 class="mb-3">{{ __('تحديد موقع الجمل') }}</h4>
<div class="card shadow-sm p-3">
    <div class="row">
        <div class="col-md-8">
            <div id="map" style="height: 400px; width: 100%; border-radius: 10px;"></div>
        </div>
        <div class="col-md-4">
            <label>{{ __('البحث عن موقع') }}</label>
            <input type="text" id="locationSearch" class="form-control" placeholder="ابحث عن الموقع (مثال: الجبيل)">
            <div class="row mt-3">
                <div class="form-group col-md-6">
                    <label>{{ __('خط العرض') }}</label>
                    <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', $trackerDevice->latitude ?? '') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>{{ __('خط الطول') }}</label>
                    <input type="text" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', $trackerDevice->longitude ?? '') }}" required>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        var map = L.map('map').setView([24.774265, 46.738586], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var marker;
        function updateMarker(lat, lng) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lng]).addTo(map);
            map.setView([lat, lng], 12);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }

        map.on('click', function(e) {
            updateMarker(e.latlng.lat, e.latlng.lng);
        });

        document.getElementById('camelSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var lat = selectedOption.getAttribute('data-lat') || 24.774265;
            var lng = selectedOption.getAttribute('data-lng') || 46.738586;
            updateMarker(lat, lng);
        });
        document.getElementById('locationSearch').addEventListener('change', function() {
            event.preventDefault()
            var searchText = this.value;
            if (searchText) {
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${searchText}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            var lat = data[0].lat;
                            var lon = data[0].lon;
                            updateMarker(lat, lon);
                        } else {
                            alert("لم يتم العثور على الموقع، يرجى المحاولة مرة أخرى.");
                        }
                    });
            }
        });
    </script>
@endpush
