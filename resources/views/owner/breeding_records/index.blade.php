@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-venus-mars"></i> {{ __('إدارة سجلات التزاوج') }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="d-flex mainAdd">
                        <h3 class="tile-title">{{__('قائمة سجلات التزاوج')}}</h3>
                        <a href="{{ route('owner.breeding_records.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> {{ __('إضافة سجل تزاوج') }}
                        </a>
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('الجمل الرئيسي') }}</th>
                            <th>{{ __('الجمل الشريك') }}</th>
                            <th>{{ __('تاريخ التزاوج') }}</th>
                            <th>{{ __('الحالة') }}</th>
                            <th>{{ __('العمليات') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($breedingRecords as $index => $record)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ optional($record->camel)->name ?? 'غير محدد' }}</td>
                                <td>{{ optional($record->mate)->name ?? 'غير محدد' }}</td>
                                <td>{{ $record->date }}</td>
                                <td>{{ $record->status == 'pregnant' ? 'حامل' : 'غير حامل' }}</td>
                                <td>
                                    <a href="{{ route('owner.breeding_records.edit', $record->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i> {{ __('تعديل') }}
                                    </a>
                                    <form action="{{ route('owner.breeding_records.destroy', $record->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
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
