<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ذود</title>
    <link rel="icon" href="{{ asset('logo_bg.png') }}">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kufam:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
@stack('css')
</head>

<body>
<div class="container-fluid mainBG  p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-map-marker-alt text-white me-2"></small>
                <small class="text-white">الجبيل - السعودية</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center py-3">
                <small class="far fa-clock text-white me-2"></small>
                <small class="text-white">الأحد  - الخميس: 09:00 AM - 07:00 PM</small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                <small class="fa fa-phone-alt text-white me-2"></small>
                <small class="text-white">+966 000 000 000</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn btn-sm-square  text-white me-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-sm-square  text-white me-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-sm-square  text-white me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-sm-square  text-white me-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

<nav class="navbar container navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img height="77px" src="{{ asset('logo_bg.png') }}" alt="logo"> <strong class="strongLogo">ذود</strong>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link  {{ Request::is('/') ? 'active' : '' }}">الرئيسية</a>
            <a href="{{ url('/about') }}" class="nav-item nav-link {{ Request::is('/about') ? 'active' : '' }}">من نحن</a>
            <a href="{{ url('/how_it_works') }}" class="nav-item nav-link {{ Request::is('/how_it_works') ? 'active' : '' }}"> كيف يعمل؟</a>
            <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('/contact') ? 'active' : '' }}"> اتصل بنا</a>

{{--            <a href="#" class="nav-item nav-link">Project</a>--}}
{{--            <div class="nav-item dropdown">--}}
{{--                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>--}}
{{--                <div class="dropdown-menu fade-up m-0">--}}
{{--                    <a href="#" class="dropdown-item">Products</a>--}}
{{--                    <a href="#" class="dropdown-item">Our Team</a>--}}
{{--                    <a href="#" class="dropdown-item">Testimonial</a>--}}
{{--                    <a href="#" class="dropdown-item">Our Works</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <a href="#" class="nav-item nav-link">Contact</a>--}}
        </div>
        <a href="{{route('register')}}" class="px-lg-5 d-none d-lg-block">
            <p class="joining">انضم إلينا الأن
                <i class="fa fa-arrow-left ms-1"></i>
            </p>
        </a>
    </div>
</nav>
<main>
    @yield('content')
</main>

<footer class="footer-area mt-4">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1 text-center">
                    <a href="{{ url('/') }}"><img height="80px" src="{{ asset('logo_bg.png') }}" alt=""></a>
                    <p class="text-white">نظام زود يساعدك في تتبع الإبل بسهولة وتحليل حالتها الصحية بكل دقة.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h5 class="text-white"> ابقي على تواصل معنا على منصاتنا : </h5>
                    <div class="social_icon">
                        <a class="text-white" href="#"><i class="ti-facebook"></i></a>
                        <a class="text-white" href="#"><i class="ti-twitter-alt"></i></a>
                        <a class="text-white" href="#"><i class="ti-instagram"></i></a>
                        <a class="text-white" href="#"><i class="ti-skype"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h5 class="text-white">تواصل معنا</h5>
                    <div class="contact_info">
                        <p class="text-white"><span class="text-white"> الهاتف :</span> +966 555 555 555</p>
                        <p class="text-white"><span class="text-white"> البريد الإلكتروني :</span> info@zod.com</p>
                    </div>
                </div>
            </div>
            <div  class="col-md-12 text-center">
                <p class="text-white" style="border-top: 1px solid white;">© {{ date('Y') }} جميع الحقوق محفوظة لموقع زود</p>
            </div>

        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/jquery-1.12.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/boot_main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/masonry.pkgd.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@stack('js')
<script>
    $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
            $('.sticky-top').addClass('sticky-nav').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('sticky-nav').css('top', '-100px');
        }
    });
</script>
</body>
</html>
