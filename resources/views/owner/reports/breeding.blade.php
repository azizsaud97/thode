@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-venus-mars"></i> {{ __('تقرير أداء التزاوج') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('owner.reports.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>

        <!-- Best & Worst Breeding Performance -->
        <div class="row">
            <!-- Most Successful Breeding Camel -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold">{{ __('أفضل جمل في التزاوج') }}</h5>
                    @if($bestBreeder)
                        <i class="fa fa-trophy fa-3x text-success"></i>
                        <h4 class="mt-2">{{ $bestBreeder->name }}</h4>
                        <p class="text-muted">{{ __('إجمالي مرات التزاوج الناجحة: ') }} {{ $bestBreeder->breeding_records_count }}</p>
                    @else
                        <p class="text-muted">{{ __('لا يوجد بيانات متاحة') }}</p>
                    @endif
                </div>
            </div>

            <!-- Least Successful Breeding Camel -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold text-danger">{{ __('أقل جمل نجاحًا في التزاوج') }}</h5>
                    @if($worstBreeder)
                        <i class="fa fa-exclamation-circle fa-3x text-danger"></i>
                        <h4 class="mt-2">{{ $worstBreeder->name }}</h4>
                        <p class="text-muted">{{ __('إجمالي المحاولات الفاشلة: ') }} {{ $worstBreeder->breeding_records_count }}</p>
                    @else
                        <p class="text-muted">{{ __('لا يوجد بيانات متاحة') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold">{{ __('إجمالي حالات التزاوج') }}</h5>
                    <p class="text-primary">{{ $totalBreeding }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm border-0 text-center p-3">
                    <h5 class="font-weight-bold">{{ __('معدل نجاح التزاوج') }}</h5>
                    <p class="text-success">{{ number_format($successRate, 2) }}%</p>
                </div>
            </div>
        </div>
        <hr>

        <!-- Breeding History Table -->
        <div class="tile mt-4">
            <h3 class="tile-title">{{ __('سجل التزاوج') }}</h3>

            <table class="table table-striped" id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('الجمل الرئيسي') }}</th>
                    <th>{{ __('الجمل الشريك') }}</th>
                    <th>{{ __('تاريخ التزاوج') }}</th>
                    <th>{{ __('الحالة') }}</th>
                    <th>{{ __('الناتج') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($breedingRecords as $index => $record)
                    <tr class="{{ $record->status == 'pregnant' ? 'table' : 'table-danger' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $record->camel->name }}</td>
                        <td>{{ $record->mate ? $record->mate->name : 'غير محدد' }}</td>
                        <td>{{ $record->date }}</td>
                        <td class="{{ $record->status == 'Pregnant' ? 'text-success' : 'text-danger' }}">
                            {{ $record->status == 'pregnant' ? 'حامل' : 'فشل التزاوج' }}
                        </td>
                        <td>{{ $record->offspring ? $record->offspring->name : 'لا يوجد' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Breeding Statistics -->

    </main>
@endsection
