@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-users"></i> {{ __('إدارة الملاك') }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="d-flex mainAdd">
                        <h3 class="tile-title">{{ __('قائمة الملاك') }}</h3>
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('اسم المالك') }}</th>
                            <th>{{ __('البريد الإلكتروني') }}</th>
                            <th>{{ __('رقم الهاتف') }}</th>
                            <th>{{ __('السجل المدني') }}</th>
                            <th>{{ __('عدد الجمال') }}</th>
                            <th>{{ __('العمليات') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($owners as $index => $owner)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $owner->name }}</td>
                                <td>{{ $owner->email }}</td>
                                <td>{{ $owner->phone }}</td>
                                <td>{{ $owner->civil_registry }}</td>
                                <td>{{ $owner->camels_count }}</td>
                                <td>
                                    <a href="{{ route('admin.owners.show', $owner->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i> {{ __('عرض') }}
                                    </a>
{{--                                    <a href="{{ route('admin.owners.edit', $owner->id) }}" class="btn btn-primary btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i> {{ __('تعديل') }}--}}
{{--                                    </a>--}}
{{--                                    <form action="{{ route('admin.owners.destroy', $owner->id) }}" method="POST" class="d-inline">--}}
{{--                                        @csrf @method('DELETE')--}}
{{--                                        <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                            <i class="fa fa-trash"></i> {{ __('حذف') }}--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
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
