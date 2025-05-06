@extends('website.app')

@section('title', 'الرئيسية - ذود')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

@endpush
@section('content')
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

{{--    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">--}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/b.jpeg') }}');">
                <div class="carousel-caption d-md-block">
                    <h5 class="animate__animated animate__fadeInDown">مرحباً بك في <span style="color: #461799;">ذود</span></h5>
                    <p class="animate__animated animate__fadeInUp">نمنحك أدوات ذكية لإدارة الإبل بسهولة وكفاءة.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('assets/img/banner1.jpg') }}');">
                <div class="carousel-caption d-md-block">
                    <h5 class="animate__animated animate__fadeInDown">تتبع موقع إبلّك <span style="color: #461799;">في الوقت الحقيقي</span></h5>
                    <p class="animate__animated animate__fadeInUp">ابقَ على اطلاع بموقع الإبل لحمايتها من الضياع.</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('assets/img/banner2.jpg') }}');">
                <div class="carousel-caption d-md-block">
                    <h5 class="animate__animated animate__fadeInDown">إدارة فعالة <span style="color: #461799;">بذكاء تقني</span></h5>
                    <p class="animate__animated animate__fadeInUp">تحكم في بيانات الإبل واتخذ قرارات مدروسة.</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

<section style="    background: #f7f7f7;" class="feature_part py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-12">
                <div class="single_feature_text">
                    <h2 class="display-4 font-weight-bold text">مميزات نظام ذود</h2>
                    <p class="lead text-muted">اكتشف الميزات المتطورة التي يقدمها نظام ذود لتتبع وإدارة الإبل باستخدام أحدث التقنيات.</p>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="single_feature card border-0 shadow-sm text-center p-4 rounded-lg">
                    <div class="single_feature_part">
                        <span class="single_feature_icon display-4"><i class="ti-map-alt"></i></span>
                        <h4 class="mt-3 font-weight-bold">تتبع مباشر</h4>
                        <p>تمتع بميزة تتبع إبلَك في الوقت الفعلي باستخدام تقنية GPS المتطورة.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="single_feature card border-0 shadow-sm text-center p-4 rounded-lg" >
                    <div class="single_feature_part">
                        <span class="single_feature_icon display-4"><i class="ti-heart-broken"></i></span>
                        <h4 class="mt-3 font-weight-bold">إدارة الصحة</h4>
                        <p>تحليلات دقيقة وتنبيهات صحية حول حالة الإبل لضمان العناية المثلى.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="single_feature card border-0 shadow-sm text-center p-4 rounded-lg" >
                    <div class="single_feature_part">
                        <span class="single_feature_icon display-4"><i class="ti-bell"></i></span>
                        <h4 class="mt-3 font-weight-bold">تنبيهات ذكية</h4>
                        <p>احصل على تنبيهات فورية عند خروج الإبل عن المنطقة المحددة أو حدوث طارئ.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="single_feature card border-0 shadow-sm text-center p-4 rounded-lg" >
                    <div class="single_feature_part">
                        <span class="single_feature_icon display-4"><i class="ti-stats-up"></i></span>
                        <h4 class="mt-3 font-weight-bold">تقارير وتحليلات</h4>
                        <p>بيانات دقيقة حول حركة وصحة وأداء الإبل لتحسين إدارتها بكفاءة.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="single_feature card border-0 shadow-sm text-center p-4 rounded-lg" >
                    <div class="single_feature_part">
                        <span class="single_feature_icon display-4"><i class="ti-lock"></i></span>
                        <h4 class="mt-3 font-weight-bold">أمان وحماية</h4>
                        <p>يستخدم ذود تقنيات التشفير الحديثة لحماية البيانات وضمان الخصوصية.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="single_feature card border-0 shadow-sm text-center p-4 rounded-lg" >
                    <div class="single_feature_part">
                        <span class="single_feature_icon display-4"><i class="fas fa-dna"></i></span>
                        <h4 class="mt-3 font-weight-bold"> إدارة النسل</h4>
                        <p>تابع نسل الأبل وسجلات التزاوج والولادة بدقة لتنميه القطيع بطريقة مدروسة وفعالة.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

@endpush
