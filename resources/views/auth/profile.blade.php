@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> {{ __('تحديث الملف الشخصي') }} </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">{{ __('تحديث الملف الشخصي') }}</h3>
                    <form class="row" method="post" action="{{ route('update_profile') }}">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="Name">{{ __('الاسم الكامل') }}</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="Name" type="text" name="name" value="{{ old('name', $user->name) }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Mail">{{ __('البريد الإلكتروني') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" id="Mail" type="email" name="email" value="{{ old('email', $user->email) }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Phone">{{ __('رقم الجوال') }}</label>
                            <input class="form-control @error('phone') is-invalid @enderror" id="Phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}">
                            <small class="text-muted">يجب أن يبدأ بـ 05 متبوعًا بـ 8 أرقام أو +9665 متبوعًا بـ 8 أرقام</small>
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Address">{{ __('العنوان') }}</label>
                            <input class="form-control @error('address') is-invalid @enderror" id="Address" type="text" name="address" value="{{ old('address', $user->address) }}">
                            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Mail">{{ __('رقم الهوية ') }}</label>
                            <input class="form-control @error('national_id') is-invalid @enderror" id="Mail" type="text" readonly disabled name="national_id" value="{{ old('national_id', $user->national_id) }}">
                            @error('national_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('حفظ التغييرات') }} <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
