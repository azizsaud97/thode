@extends('admin.main')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-lock"></i> {{ __('تحديث كلمة المرور') }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">{{ __('تحديث كلمة المرور') }}</h3>
                    <form class="row" method="post" action="{{ route('update_password') }}">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="current_password">{{ __('كلمة المرور الحالية') }}</label>
                            <input class="form-control @error('current_password') is-invalid @enderror" id="current_password" type="password" name="current_password" required>
                            @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="new_password">{{ __('كلمة المرور الجديدة') }}</label>
                            <input class="form-control @error('new_password') is-invalid @enderror" id="new_password" type="password" name="new_password" required>
                            <a href="#" onclick="showPasswordHint()" class="d-block mt-1 text-primary">متطلبات كلمة المرور</a>
                            @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="new_password_confirmation">{{ __('تأكيد كلمة المرور الجديدة') }}</label>
                            <input class="form-control" id="new_password_confirmation" type="password" name="new_password_confirmation" required>
                        </div>

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">{{ __('حفظ التغييرات') }} <i class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Password Strength Modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="passwordModalLabel">متطلبات كلمة المرور</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>يجب أن تحتوي على 8 أحرف على الأقل</li>
                        <li>يجب أن تحتوي على حرف كبير واحد على الأقل (A-Z)</li>
                        <li>يجب أن تحتوي على حرف صغير واحد على الأقل (a-z)</li>
                        <li>يجب أن تحتوي على رقم واحد على الأقل (0-9)</li>
                        <li>يجب أن تحتوي على رمز خاص واحد على الأقل (@, #, $, %, &)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        function showPasswordHint() {
            $('#passwordModal').modal('show');
        }
    </script>
@endpush
