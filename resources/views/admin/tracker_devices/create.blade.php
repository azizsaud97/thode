@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-plus"></i> {{ __('إضافة جهاز تتبع جديد') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('admin.tracker_devices.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="tile">
                    <h3 class="tile-title">{{ __('بيانات جهاز التتبع') }}</h3>
                    <form action="{{ route('admin.tracker_devices.store') }}" method="POST">
                        @csrf
                        @include('admin.tracker_devices.form')

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> {{ __('حفظ') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
