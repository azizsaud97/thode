@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-heartbeat"></i> {{ __('تقرير صحة الأبل') }}</h1>

            <a class="btn btn-outline-danger " href="{{route('owner.reports.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold">{{ __('متوسط الوزن') }}</h5>
                    <p class="text-primary">{{ number_format($avg_weight, 2) }} كجم</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold">{{ __('متوسط الارتفاع') }}</h5>
                    <p class="text-primary">{{ number_format($avg_height, 2) }} سم</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold">{{ __('متوسط معدل ضربات القلب') }}</h5>
                    <p class="text-primary">{{ number_format($avg_heart_rate, 2) }} bpm</p>
                </div>
            </div>
        </div>

        <hr>

        <!-- Health Check Details -->
        <div class="tile mt-4">
            <h3 class="tile-title">{{ __('سجل صحة الأبل') }}</h3>

            <table class="table table-striped" id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('اسم الجمل') }}</th>
                    <th>{{ __('تاريخ الفحص') }}</th>
                    <th>{{ __('درجة الحرارة') }}</th>
                    <th>{{ __('معدل ضربات القلب') }}</th>
                    <th>{{ __('التشخيص') }}</th>
                    <th>{{ __('العلاج') }}</th>
                    <th>{{ __('الطبيب البيطري') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($healthRecords as $index => $record)
                    <tr class="{{ $record->temperature > 39 || $record->heart_rate > 58 ? 'table-danger' : 'table' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $record->camel->name }}</td>
                        <td>{{ $record->checkup_date }}</td>
                        <td class="{{ $record->temperature > 39 ? 'text-danger' : 'text-success' }}">{{ $record->temperature }}°C</td>
                        <td class="{{ $record->heart_rate > 58 ? 'text-danger' : 'text-success' }}">{{ $record->heart_rate }} bpm</td>
                        <td class="{{ strtolower($record->diagnosis) == 'مريض' ? 'text-danger' : 'text-success' }}">
                            {{ $record->diagnosis }}
                        </td>
                        <td>{{ $record->treatment }}</td>
                        <td>{{ $record->veterinarian }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </main>
@endsection
