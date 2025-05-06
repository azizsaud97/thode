@extends('website.app')

@section('title', 'اتصل بنا - ذود')

@section('content')

    <!-- Breadcrumb Section -->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>اتصل بنا</h2>
                            <p><a href="{{ url('/') }}">الرئيسية</a> <span>/</span> اتصل بنا</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact_info_section py-5">
        <div class="container">
            <div class="section_title text-center mb-5">
                <h2 class="font-weight-bold text-primary">تواصل معنا</h2>
                <p class="text-muted">نحن هنا لمساعدتك. لا تتردد في التواصل معنا عبر القنوات التالية.</p>
            </div>
            <div class="row text-right">
                <div class="col-md-4 text-center">
                    <div class="card border-0 shadow-sm p-4 rounded-lg">
                        <span class="display-4 text-primary"><i class="ti-mobile"></i></span>
                        <h4 class="mt-3 font-weight-bold">الهاتف</h4>
                        <p class="text-muted">+966 555 555 555</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card border-0 shadow-sm p-4 rounded-lg">
                        <span class="display-4 text-danger"><i class="ti-email"></i></span>
                        <h4 class="mt-3 font-weight-bold">البريد الإلكتروني</h4>
                        <p class="text-muted">info@naqti.com</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card border-0 shadow-sm p-4 rounded-lg">
                        <span class="display-4 text-success"><i class="ti-printer"></i></span>
                        <h4 class="mt-3 font-weight-bold">الفاكس</h4>
                        <p class="text-muted">+966 555 555 556</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact_section py-5 bg-light">
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <form class="form-contact contact_form shadow-sm" action="#" method="post" id="contactForm">--}}

{{--                        <h3 class="font-weight-bold text-primary text-center mb-4">أرسل لنا رسالة</h3>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="5" placeholder="اكتب رسالتك هنا"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" name="name" id="name" type="text" placeholder="الاسم">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" name="email" id="email" type="email" placeholder="البريد الإلكتروني">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <input class="form-control" name="subject" id="subject" type="text" placeholder="الموضوع">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group text-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary w-25 btn-lg">إرسال الرسالة</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>

    <!-- Map Section -->
    <section class="map_section">
        <div class="container-fluid">
            <div id="map" style="height: 480px;"></div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var map = L.map('map').setView([27.004524, 49.660515], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            L.marker([27.004524, 49.660515]).addTo(map)
                .bindPopup('ذود - الجبيل، المملكة العربية السعودية')
                .openPopup();
        });
    </script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

@endsection
