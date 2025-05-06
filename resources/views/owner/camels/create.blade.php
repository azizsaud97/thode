@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-camel"></i> {{ isset($camel) ? __('تحديث بيانات الجمل') : __('إضافة جمل جديد') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('owner.camels.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    @include('owner.camels.form', ['camel' => $camel ?? null])
                </div>
            </div>
        </div>
    </main>
@endsection
