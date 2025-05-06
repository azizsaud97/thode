@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-cogs"></i> {{ __('إدارة الإبل') }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="d-flex mainAdd">
                        <h3 class="tile-title">{{__('قائمة الإبل')}}</h3>
                        <a href="{{ route('owner.camels.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> {{ __('إضافة جمل') }}
                        </a>
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('رقم الوسم') }}</th>
                            <th>{{ __('الاسم') }}</th>
                            <th>{{ __('السلالة') }}</th>
                            <th>{{ __('اللون') }}</th>
                            <th>{{ __('الحالة الصحية') }}</th>
                            <th>{{ __('العمليات') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($camels as $index => $camel)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $camel->tag_number }}</td>
                                <td>{{ $camel->name }}</td>
                                <td>{{ $camel->breed }}</td>
                                <td>{{ $camel->color }}</td>
                                <td>{{ $camel->health_status }}</td>
                                <td>
                                     <a href="https://www.google.com/maps?q={{ $camel->gpsLocation->latitude ?? 0 }},{{ $camel->gpsLocation->longitude ?? 0 }}"
       target="_blank" class="btn btn-success btn-sm">
        <i class="fa fa-map-marker"></i> {{ __('عرض الموقع') }}
    </a>
                                    <a href="{{ route('owner.camels.edit', $camel->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i> {{ __('تعديل') }}
                                    </a>
                                    <form id="form{{$camel->id}}" action="{{ route('owner.camels.destroy', $camel->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="confirmation('form{{$camel->id}}', '{{$camel->tag_number}}')" class="btn btn-danger btn-sm">
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
