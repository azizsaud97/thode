@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-heartbeat"></i> {{ __('إدارة السجلات الصحية') }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="d-flex mainAdd">
                        <h3 class="tile-title">{{__('قائمة السجلات الصحية')}}</h3>
                        <a href="{{ route('owner.health_records.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> {{ __('إضافة سجل صحي') }}
                        </a>
                    </div>

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('الجمل') }}</th>
                            <th>{{ __('تاريخ الفحص') }}</th>
                            <th>{{ __('التشخيص') }}</th>
                            <th>{{ __('العلاج') }}</th>
                            <th>{{ __('العمليات') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($healthRecords as $index => $record)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ optional($record->camel)->name ?? 'غير محدد' }}</td>
                                <td>{{ $record->checkup_date }}</td>
                                <td>{{ $record->diagnosis }}</td>
                                <td>{{ $record->treatment }}</td>
                                <td>
                                    <!-- View Button to Open Modal -->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#healthRecordModal{{$record->id}}">
                                        <i class="fa fa-file-medical"></i> {{ __('شهادة صحية') }}
                                    </button>

                                    <a href="{{ route('owner.health_records.edit', $record->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i> {{ __('تعديل') }}
                                    </a>
                                    <form id="form{{$record->id}}" action="{{ route('owner.health_records.destroy', $record->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="confirmation('form{{$record->id}}', '{{$record->id}}')" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> {{ __('حذف') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Health Record Modal -->
                            <div class="modal fade" id="healthRecordModal{{$record->id}}" tabindex="-1" role="dialog" aria-labelledby="healthRecordLabel{{$record->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="healthRecordLabel{{$record->id}}">📜 {{ __('شهادة صحية') }} - {{ optional($record->camel)->name ?? 'غير محدد' }}</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>🐪 اسم الجمل:</strong> {{ optional($record->camel)->name ?? 'غير محدد' }}</p>
                                                    <p><strong>📅 تاريخ الفحص:</strong> {{ $record->checkup_date }}</p>
                                                    <p><strong>⚖️ الوزن:</strong> {{ $record->weight }} كجم</p>
                                                    <p><strong>📏 الارتفاع:</strong> {{ $record->height }} سم</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>🌡️ درجة الحرارة:</strong> {{ $record->temperature }} °C</p>
                                                    <p><strong>❤️ معدل ضربات القلب:</strong> {{ $record->heart_rate }} نبضة/دقيقة</p>
                                                    <p><strong>🩸 نتائج فحص الدم:</strong> {{ $record->blood_test_results ?? 'لا يوجد' }}</p>
                                                    <p><strong>🩹 الحساسية:</strong> {{ $record->allergies ?? 'لا يوجد' }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>💊 الأدوية المقدمة:</strong> {{ $record->medications_given ?? 'لا يوجد' }}</p>
                                                    <p><strong>📆 موعد الفحص القادم:</strong> {{ $record->next_checkup_date ?? 'غير محدد' }}</p>
                                                    <p><strong>📝 التشخيص:</strong> {{ $record->diagnosis }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><strong>🏥 العلاج:</strong> {{ $record->treatment }}</p>
                                                    <p><strong>👨‍⚕️ الطبيب البيطري:</strong> {{ $record->veterinarian ?? 'غير محدد' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('إغلاق') }}</button>
                                            <button type="button" class="btn btn-primary" onclick="window.print();">{{ __('طباعة') }} <i class="fa fa-print"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
@endsection
