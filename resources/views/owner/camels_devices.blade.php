@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-microchip"></i> {{ __('أجهزة تتبع الجمال') }}</h1>
        </div>

        <div class="row">
            @foreach ($camels as $camel)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $camel->name }}</h5>

                            <div class="mb-3">
                                @if(optional($camel->trackerDevice)->device_type == 'GPS Tracker')
                                    <i class="fa fa-map-marker fa-3x text-primary"></i>
                                @elseif(optional($camel->trackerDevice)->device_type == 'RFID Tracker')
                                    <i class="fa fa-rss fa-3x text-warning"></i>
                                @elseif(optional($camel->trackerDevice)->device_type == 'Satellite Tracker')
                                    <i class="fa fa-microchip fa-3x text-info"></i>
                                @elseif(optional($camel->trackerDevice)->device_type == 'Bluetooth Tracker')
                                    <i class="fa fa-bluetooth fa-3x text-secondary"></i>
                                @else
                                    <i class="fa fa-microchip fa-3x text-muted"></i>
                                @endif
                            </div>

                            <p class="mb-1"><strong>{{ __('نوع الجهاز') }}:</strong> {{ optional($camel->trackerDevice)->device_type ?? 'غير متوفر' }}</p>
                            <p class="mb-1"><strong>{{ __('موديل الجهاز') }}:</strong> {{ optional($camel->trackerDevice)->device_model ?? 'غير متوفر' }}</p>

                            <p class="mb-2">
                                <strong>{{ __('الحالة') }}:</strong>
                                @if(optional($camel->trackerDevice)->status == 'active')
                                    <span class="badge badge-success">نشط</span>
                                @elseif(optional($camel->trackerDevice)->status == 'inactive')
                                    <span class="badge badge-danger">غير نشط</span>
                                @else
                                    <span class="badge badge-secondary">غير متوفر</span>
                                @endif
                            </p>

                            <hr>
                            <p class="text-muted small mb-1"><i class="fa fa-map-marker-alt"></i> <strong>{{ __('الموقع (خط العرض)') }}:</strong> {{ optional($camel->gpsLocation)->latitude ?? 'غير متوفر' }}</p>
                            <p class="text-muted small"><i class="fa fa-map-marker-alt"></i> <strong>{{ __('الموقع (خط الطول)') }}:</strong> {{ optional($camel->gpsLocation)->longitude ?? 'غير متوفر' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $camels->links() }} <!-- Pagination -->
        </div>
    </main>
@endsection
