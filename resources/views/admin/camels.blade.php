@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <h1><i class="fa fa-paw"></i> {{ __('إدارة الجمال') }}</h1>
        </div>
        <!-- Filter Section -->
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <form method="GET" action="{{ route('admin.camels.index') }}">
                        <div class="row">
                            <!-- Breed Filter -->
                            <!-- Color Filter -->
                            <div class="col-md-3">
                                <label>{{ __('اللون') }}</label>
                                <select name="color" class="form-control">
                                    <option value="">{{ __('كل الألوان') }}</option>
                                    <option value="أسود" {{ request('color') == 'أسود' ? 'selected' : '' }}>مجاهيم </option>
                                    <option value="وضح" {{ request('color') == 'وضح' ? 'selected' : '' }}>مغاتير - وضح</option>
                                    <option value="شقح" {{ request('color') == 'شقح' ? 'selected' : '' }}>مغاتير - شقح</option>
                                    <option value="صفر" {{ request('color') == 'صفر' ? 'selected' : '' }}>مغاتير - صفر</option>
                                    <option value="حمر" {{ request('color') == 'حمر' ? 'selected' : '' }}>مغاتير - حمر</option>
                                    <option value="شعل" {{ request('color') == 'شعل' ? 'selected' : '' }}>مغاتير - شعل</option>
                                </select>
                            </div>



                            <!-- Gender Filter -->
                            <div class="col-md-3">
                                <label>{{ __('الجنس') }}</label>
                                <select name="gender" class="form-control">
                                    <option value="">{{ __('الجميع') }}</option>
                                    <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                                    <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
                                </select>
                            </div>

                            <!-- Health Status Filter -->
                            <div class="col-md-3">
                                <label>{{ __('الحالة الصحية') }}</label>
                                <select name="health_status" class="form-control">
                                    <option value="">{{ __('كل الحالات') }}</option>
                                    <option value="جيدة" {{ request('health_status') == 'جيدة' ? 'selected' : '' }}>جيدة</option>
                                    <option value="غير جيدة" {{ request('health_status') == 'غير جيدة' ? 'selected' : '' }}>غير جيدة</option>

                                </select>
                            </div>

                            <!-- Owner Filter -->
                            <div class="col-md-3">
                                <label>{{ __('المالك') }}</label>
                                <select name="owner_id" class="form-control select2">
                                    <option value="">{{ __('كل الملاك') }}</option>
                                    @foreach ($owners as $id => $o)
                                        <option value="{{ $id }}" {{ request('owner_id') == $id ? 'selected' : '' }}>
                                            {{ $o->name }} [{{$o->civil_registry}}]
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-filter"></i> {{ __('تطبيق الفلاتر') }}
                            </button>
                            <a href="{{ route('admin.camels.index') }}" class="btn btn-secondary">
                                <i class="fa fa-times"></i> {{ __('إعادة تعيين') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">{{ __('قائمة الجمال') }}</h3>

                    <table class="table table-striped" id="datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('رقم الوسم') }}</th>
                            <th>{{ __('اسم الجمل') }}</th>
                            <th>{{ __('السلالة') }}</th>
                            <th>{{ __('العمر') }}</th>
                            <th>{{ __('الحالة الصحية') }}</th>
                            <th>{{ __('المالك') }}</th>
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
                                <td>{{ $camel->date_of_birth ? \Carbon\Carbon::parse($camel->date_of_birth)->age . ' سنة' : 'غير متوفر' }}</td>
                                <td>{{ $camel->health_status }}</td>
                                <td>{{ optional($camel->owner)->name ?? 'غير معروف' }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#camelModal{{ $camel->id }}">
                                        <i class="fa fa-eye"></i> {{ __('عرض التفاصيل') }}
                                    </button>
                                    <div class="modal fade" id="camelModal{{ $camel->id }}" tabindex="-1" role="dialog" aria-labelledby="camelModalLabel{{ $camel->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="camelModalLabel{{ $camel->id }}">{{ __('تفاصيل الجمل') }} - {{ $camel->name }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>{{ __('رقم الوسم') }}</th>
                                                            <td>{{ $camel->tag_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الاسم') }}</th>
                                                            <td>{{ $camel->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('السلالة') }}</th>
                                                            <td>{{ $camel->breed }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('اللون') }}</th>
                                                            <td>{{ $camel->color }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الوزن') }}</th>
                                                            <td>{{ $camel->weight }} كجم</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الطول') }}</th>
                                                            <td>{{ $camel->height }} متر</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('تاريخ الميلاد') }}</th>
                                                            <td>{{ $camel->date_of_birth ?? 'غير متوفر' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الجنس') }}</th>
                                                            <td>{{ $camel->gender == 'male' ? 'ذكر' : 'أنثى' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الأصل') }}</th>
                                                            <td>{{ $camel->origin }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الحالة الصحية') }}</th>
                                                            <td>{{ $camel->health_status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('الموقع الحالي') }}</th>
                                                            <td>{{ $camel->location ?? 'غير متوفر' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('رقم الشريحة الإلكترونية') }}</th>
                                                            <td>{{ $camel->rfid_chip_id ?? 'غير متوفر' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{ __('المالك') }}</th>
                                                            <td>{{ optional($camel->owner)->name ?? 'غير معروف' }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('إغلاق') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
