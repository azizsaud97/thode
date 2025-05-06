@extends('website.app')

@section('title', 'تسجيل مالك الإبل - زود')

@section('content')

    <!-- Breadcrumb Section -->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>انضم إلى زود الآن</h2>
                            <p><a href="{{ url('/') }}">الرئيسية</a> <span>/</span> تسجيل مالك الإبل</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="register_section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="card border-0 shadow-lg p-4 rounded-lg">

                        <div class="section_title text-center mb-4">
                            <h2 class="font-weight-bold text-primary"></h2>
                            <p class="text-muted">قم بإنشاء حساب جديد لتتمكن من تتبع وإدارة إبلَك بسهولة.</p>
                        </div>

                        <form action="{{ route('register.process') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">الاسم الكامل <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">رقم الهوية الوطنية <span class="text-danger">*</span></label>
                                <input type="text" name="national_id" class="form-control @error('national_id') is-invalid @enderror" required  value="{{ old('national_id') }}" maxlength="10">
                                <small class="text-muted">يجب أن يتكون من 10 أرقام فقط</small>
                                <br>
                                @error('national_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">السجل المدني</label>
                                <input type="text" name="civil_registry" class="form-control @error('civil_registry') is-invalid @enderror" value="{{ old('civil_registry') }}">
                                @error('civil_registry') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">العنوان <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required  value="{{ old('address') }}">
                                <br>
                                @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">البريد الإلكتروني <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required  value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">رقم الجوال <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" required  value="{{ old('phone') }}">
                                <small class="text-muted">يجب أن يبدأ بـ 05 متبوعًا بـ 8 أرقام أو +9665 متبوعًا بـ 8 أرقام</small>
                                <br>
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">كلمة المرور <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required >
                                <a href="#" onclick="showPasswordHint()" class="d-block mt-1 text-primary">متطلبات كلمة المرور</a>
                                <br>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold float-right">تأكيد كلمة المرور <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" class="form-control" required >
                            </div>
                            <div class="form-group form-check text-right">
                                <input type="checkbox" name="terms" class="form-check-input ml-2" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    أوافق على <a href="#" onclick="showTerms()" class="text-primary font-weight-bold">الشروط والأحكام</a>
                                </label>
                            </div>

                          <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-primary btn-block mt-3">إنشاء الحساب</button>
                          </div>

                            <div class="col-md-12 text-center mt-3">
                                <p class="text-muted">لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="font-weight-bold text-primary">تسجيل الدخول</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
    <!-- Terms & Conditions Modal -->
    <div style="z-index: 9999999999999999999;" class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center font-weight-bold text-primary" id="termsModalLabel">الشروط والأحكام</h5>
                </div>
                <div class="modal-body text-right">
                    <p class="text-muted">مرحبًا بك في منصة <strong>ذود</strong>. قبل التسجيل كمالك للإبل، يُرجى قراءة الشروط والأحكام بعناية:</p>
                    <ul class="list-unstyled">
                        <li class="liii"><i class="ti-check text-primary"></i> يجب على المستخدم تقديم بيانات صحيحة ومحدثة حول الإبل التي يملكها.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يلتزم المستخدم بالحفاظ على سرية بيانات حسابه وعدم مشاركتها مع أطراف أخرى.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يُمنع استخدام النظام لأي أنشطة غير قانونية أو تتعارض مع القوانين المحلية.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يتحمل المستخدم مسؤولية تحديث بيانات الإبل والتأكد من صحة المعلومات المدرجة.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يحق لإدارة هوبال تعليق أو حذف الحسابات التي تنتهك الشروط والأحكام.</li>
                    </ul>
                    <p class="text-muted">بالموافقة على هذه الشروط، يمكنك الآن إكمال عملية التسجيل.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
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
        function showTerms() {
            $('#termsModal').modal('show');
        }
    </script>
@endpush
