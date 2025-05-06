@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-edit"></i> {{ __('تعديل بيانات جهاز التتبع') }}</h1>
            <a class="btn btn-outline-danger " href="{{route('admin.tracker_devices.index')}}"><i class="fa fa-arrow-left fa-lg"></i></a>

        </div>

        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="tile">
                    <h3 class="tile-title">{{ __('تعديل بيانات الجهاز') }}</h3>
                    <form action="{{ route('admin.tracker_devices.update', $trackerDevice->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.tracker_devices.form', ['trackerDevice' => $trackerDevice])

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> {{ __('تحديث') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
