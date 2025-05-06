@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-venus-mars"></i> {{ __('إضافة سجل تزاوج جديد') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('owner.breeding_records.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    @include('owner.breeding_records.form', ['breedingRecord' => null])
                </div>
            </div>
        </div>
    </main>
@endsection
