@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-map-marker-alt"></i> {{ __('تقرير نشاط أجهزة التتبع') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('owner.reports.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 text-center p-3">
                        <h5 class="font-weight-bold">{{ __('إجمالي الأجهزة') }}</h5>
                        <p class="text-primary">{{ $totalTrackers }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm border-0 text-center p-3">
                        <h5 class="font-weight-bold">{{ __('نسبة الأجهزة النشطة') }}</h5>
                        <p class="text-success">{{ number_format($activePercentage, 2) }}%</p>
                    </div>
                </div>

        </div>
        <hr>

        <!-- Tracker Device List -->
        <div class="tile mt-4">
            <h3 class="tile-title">{{ __('سجل أجهزة التتبع') }}</h3>

            <table class="table table-striped" id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('اسم الجمل') }}</th>
                    <th>{{ __('نوع الجهاز') }}</th>
                    <th>{{ __('موديل الجهاز') }}</th>
                    <th>{{ __('الحالة') }}</th>
                    <th>{{ __('آخر موقع (خط العرض)') }}</th>
                    <th>{{ __('آخر موقع (خط الطول)') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trackerDevices as $index => $tracker)
                    <tr class="{{ $tracker->status == 'active' ? 'table' : 'table-danger' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tracker->camel->name }}</td>
                        <td>{{ $tracker->device_type }}</td>
                        <td>{{ $tracker->device_model }}</td>
                        <td class="{{ $tracker->status == 'active' ? 'text-success' : 'text-danger' }}">
                            {{ ucfirst($tracker->status) }}
                        </td>
                        <td>{{ $tracker->latestGps ? $tracker->latestGps->latitude : 'غير متوفر' }}</td>
                        <td>{{ $tracker->latestGps ? $tracker->latestGps->longitude : 'غير متوفر' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </main>
@endsection
