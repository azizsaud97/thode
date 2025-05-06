@extends('website.app')

@section('title', 'من نحن - ذود')

@section('content')

    <!-- Breadcrumb Section -->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>من نحن</h2>
                            <p><a href="{{ url('/') }}">الرئيسية</a> <span>/</span> من نحن</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about_section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/img/about_1.jpg') }}" alt="ذود Logo" class="img-fluid rounded shadow-sm">
                </div>
                <div class="col-lg-6 text-center">
                    <h2 class="font-weight-bold text-primary">عن ذود</h2>
                    <p class="lead text-muted">ذود هو نظام متكامل لإدارة وتتبع الإبل، يهدف إلى تقديم حلول تقنية حديثة لأصحاب الإبل لضمان إدارتها بكفاءة وأمان.</p>
                    <ul class="list-unstyled">
                        <li class="lii"><i class="ti-check text-primary"></i> تتبع دقيق للإبل باستخدام تقنية GPS المتطورة.</li>
                        <li class="lii"><i class="ti-check text-primary"></i> نظام ذكي يرسل تنبيهات في حالات الطوارئ.</li>
                        <li class="lii"><i class="ti-check text-primary"></i> تحليلات وتقارير شاملة حول صحة وأداء الإبل.</li>
                        <li class="lii"><i class="ti-check text-primary"></i> حماية البيانات باستخدام أحدث تقنيات الأمان.</li>
                    </ul>
                    <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg mt-3">تواصل معنا</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="mission_vision_section py-5 bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow p-4">
                        <h3 class="font-weight-bold text-primary">رؤيتنا</h3>
                        <p class="text-muted">أن نكون روّاد الحلول الذكية في إدارة الإبل عالميًا، عبر تقديم تقنيات مبتكرة تسهم في تحسين جودة الرعاية وتعزيز الأمان.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow p-4">
                        <h3 class="font-weight-bold text-primary">مهمتنا</h3>
                        <p class="text-muted">توفير منصة تقنية موثوقة ومبتكرة تتيح لأصحاب الإبل مراقبة صحتها وتتبع تحركاتها وتحليل بياناتها بسهولة وكفاءة.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="why_choose_us py-5">
        <div class="container">
            <div class="section_title text-center mb-5">
                <h2 class="font-weight-bold text-primary">لماذا تختار ذود؟</h2>
                <p class="text-muted">حلول متقدمة تجعل ذود الخيار الأول لمربي الإبل.</p>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 rounded-lg">
                        <span class="display-4 text-primary"><i class="ti-map-alt"></i></span>
                        <h4 class="mt-3 font-weight-bold">تتبع مباشر</h4>
                        <p class="text-muted">يوفر ذود نظام تتبع فوري عبر GPS يساعد على معرفة موقع الإبل في كل لحظة.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 rounded-lg">
                        <span class="display-4 text-danger"><i class="ti-bell"></i></span>
                        <h4 class="mt-3 font-weight-bold">تنبيهات ذكية</h4>
                        <p class="text-muted">تنبيهات فورية عند خروج الإبل من المناطق المحددة أو في حالات الطوارئ.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 rounded-lg">
                        <span class="display-4 text-success"><i class="ti-lock"></i></span>
                        <h4 class="mt-3 font-weight-bold">أمان متكامل</h4>
                        <p class="text-muted">أحدث تقنيات التشفير لحماية بيانات المستخدمين وضمان الخصوصية.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact_section mb-4 py-5">
        <div class="container text-center">
            <h2 class="font-weight-bold text-primary">هل لديك استفسار؟</h2>
            <p class="text-muted">فريق ذود مستعد لمساعدتك والإجابة على جميع استفساراتك.</p>
            <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg mt-3">اتصل بنا</a>
        </div>
    </section>

@endsection
