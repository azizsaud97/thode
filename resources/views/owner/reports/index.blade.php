@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1>   <i class="app-menu__icon fa fa-bar-chart"></i> {{ __('التقارير والإحصائيات') }}</h1>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <i class="fa fa-heartbeat fa-3x text-dark"></i>
                        <h5 class="card-title mt-3">{{ __('تقرير صحة الأبل') }}</h5>
                        <a href="{{ route('owner.reports.health') }}" class="btn btn-primary mt-2">
                            <i class="fa fa-eye"></i> {{ __('عرض التقرير') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <i class="fa fa-venus-mars fa-3x text-dark"></i>
                        <h5 class="card-title mt-3">{{ __('تقرير أداء التزاوج') }}</h5>
                        <a href="{{ route('owner.reports.breeding') }}" class="btn btn-primary mt-2">
                            <i class="fa fa-eye"></i> {{ __('عرض التقرير') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-body">
                        <i class="fa fa-map-marker fa-3x text-dark"></i>
                        <h5 class="card-title mt-3">{{ __('تقرير نشاط أجهزة التتبع') }}</h5>
                        <a href="{{ route('owner.reports.tracker') }}" class="btn btn-primary mt-2">
                            <i class="fa fa-eye"></i> {{ __('عرض التقرير') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
