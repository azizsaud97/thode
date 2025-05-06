@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-microchip"></i> {{ __('إدارة أجهزة التتبع') }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="d-flex mainAdd">
                        <h3 class="tile-title">{{ __('قائمة أجهزة التتبع') }}</h3>
                        <a href="{{ route('admin.tracker_devices.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> {{ __('إضافة جهاز') }}
                        </a>
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('نوع الجهاز') }}</th>
                            <th>{{ __('موديل الجهاز') }}</th>
                            <th>{{ __('الإصدار البرمجي') }}</th>
                            <th>{{ __('الحالة') }}</th>
                            <th>{{ __('الجمل المرتبط') }}</th>
                            <th>{{ __('العمليات') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($devices as $index => $device)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $device->device_type }}</td>
                                <td>{{ $device->device_model }}</td>
                                <td>{{ $device->firmware_version }}</td>
                                <td>{{ $device->status == 'active' ? 'نشط' : 'غير نشط' }}</td>
                                <td>{{ optional($device->camel)->name ?? 'غير مرتبط' }}</td>
                                <td>
                                    <a href="{{ route('admin.tracker_devices.edit', $device->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i> {{ __('تعديل') }}
                                    </a>


                                    <form id="form{{$device->id}}" action="{{ route('admin.tracker_devices.destroy', $device->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="confirmation('form{{$device->id}}', '{{$device->id}}')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> {{ __('حذف') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
