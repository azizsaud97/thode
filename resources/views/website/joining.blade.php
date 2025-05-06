@extends('website.app')

@section('title', 'انضم إلينا - ذود')

@section('content')

    <!-- Breadcrumb Section -->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>انضم إلينا</h2>
                            <p><a href="{{ url('/') }}">الرئيسية</a> <span>/</span> انضم إلينا</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Joining Section -->
    <section class="joining_section py-5">
        <div class="container">
            <div class="section_title text-center mb-5">
                <h2 class="font-weight-bold text-primary">اختر نوع حسابك</h2>
                <p class="text-muted">اختر الخيار المناسب لك للانضمام إلى ذود</p>
            </div>
            <div class="row d-flex justify-content-center text-center mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg p-4 rounded-lg">
                        <span class="display-4 text-dark"><i class="ti-shield"></i></span>
                        <h4 class="mt-3 font-weight-bold">حساب المدير</h4>
                        <p class="text-muted">إذا كنت مسؤولًا وترغب في إدارة النظام، انضم كمدير.</p>
                        <a href="{{ url('/register') }}" class="btn btn-primary mt-3">التسجيل كمدير</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-lg p-4 rounded-lg">
                        <span class="display-4 text-dark"><i class="ti-map-alt"></i></span>
                        <h4 class="mt-3 font-weight-bold">مالك الإبل</h4>
                        <p class="text-muted">إذا كنت تمتلك إبلًا وترغب في تتبعها وإدارتها، انضم الآن.</p>
                        <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#termsModal">التسجيل كمالك إبل</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terms & Conditions Modal -->
    <div style="z-index: 9999999999999999999;" class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title text-center font-weight-bold text-primary" id="termsModalLabel">الشروط والأحكام</h5>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body text-right">
                    <p class="text-muted">مرحبًا بك في منصة <strong>ذود</strong>. قبل التسجيل كمالك للإبل، يُرجى قراءة الشروط والأحكام بعناية:</p>
                    <ul class="list-unstyled">
                        <li class="liii"><i class="ti-check text-primary"></i> يجب على المستخدم تقديم بيانات صحيحة ومحدثة حول الإبل التي يملكها.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يلتزم المستخدم بالحفاظ على سرية بيانات حسابه وعدم مشاركتها مع أطراف أخرى.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يُمنع استخدام النظام لأي أنشطة غير قانونية أو تتعارض مع القوانين المحلية.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يتحمل المستخدم مسؤولية تحديث بيانات الإبل والتأكد من صحة المعلومات المدرجة.</li>
                        <li class="liii"><i class="ti-check text-primary"></i> يحق لإدارة ذود تعليق أو حذف الحسابات التي تنتهك الشروط والأحكام.</li>
                    </ul>
                    <p class="text-muted">بالموافقة على هذه الشروط، يمكنك الآن إكمال عملية التسجيل.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <a href="{{ route('register') }}" class="btn btn-primary">أوافق وأكمل التسجيل</a>
                </div>
            </div>
        </div>
    </div>

@endsection
