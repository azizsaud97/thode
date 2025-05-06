@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-user"></i> {{ __('تفاصيل المالك') }}</h1>

            <div class="text-center mt-4">
                <a href="{{ route('admin.owners.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> {{ __('العودة إلى القائمة') }}
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">{{ __('معلومات المالك') }}</h3>
                    <table class="table table-bordered">
                        <tr>
                            <th>{{ __('رقم الهوية الوطنية') }}</th>
                            <td>{{ $owner->national_id }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('الاسم') }}</th>
                            <td>{{ $owner->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('البريد الإلكتروني') }}</th>
                            <td>{{ $owner->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('رقم الهاتف') }}</th>
                            <td>{{ $owner->phone }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('العنوان') }}</th>
                            <td>{{ $owner->address }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('تاريخ التسجيل') }}</th>
                            <td>{{ $owner->registration_date }}</td>
                        </tr>
                        <tr>
                            <th>{{ __('عدد الجمال') }}</th>
                            <td>{{ $owner->camels->count() }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="tile">
                    <h3 class="tile-title">{{ __('قائمة الجمال') }}</h3>
                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('اسم الجمل') }}</th>
                            <th>{{ __('السلالة') }}</th>
                            <th>{{ __('تاريخ الميلاد') }}</th>
                            <th>{{ __('الحالة الصحية') }}</th>
                            <th>{{ __('الموقع الحالي') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($owner->camels as $index => $camel)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $camel->name }}</td>
                                <td>{{ $camel->breed }}</td>
                                <td>{{ $camel->date_of_birth }}</td>
                                <td>{{ $camel->health_status }}</td>
                                <td>{{ $camel->location ?? 'غير متوفر' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if($owner->camels->isEmpty())
                        <p class="text-center text-muted">{{ __('لا يوجد جمال مسجلة لهذا المالك.') }}</p>
                    @endif
                </div>
            </div>
        </div>


    </main>
@endsection
