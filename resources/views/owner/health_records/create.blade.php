@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-heartbeat"></i> {{ isset($healthRecord) ? __('تحديث السجل الصحي') : __('إضافة سجل صحي جديد') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('owner.health_records.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    @include('owner.health_records.form', ['healthRecord' => $healthRecord ?? null])
                </div>
            </div>
        </div>
    </main>
@endsection
