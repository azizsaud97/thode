<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>تسجيل الدخول - ذود</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
        .login-page {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-right {
            background-color: #D2B29D;
        }
        .btn-primary {
            color: #fff;
            background-color: #af9072;
            border-color: #af9072;
        }
        .btn-primary:hover {
            background-color: #906338;
            border-color: #906338;
        }
        .text-primary {
            color: #744b39 !important;
        }
    </style>
</head>
<body>

<div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <!-- Login Form -->
                        <div class="col-md-7 ps-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="{{ route('login') }}" method="POST" class="row g-4">
                                    @csrf
{{--                                    <div class="col-12">--}}
{{--                                        <label>نوع الحساب</label>--}}
{{--                                        <select name="role" class="form-control" required>--}}
{{--                                            <option value="">اختر نوع الحساب</option>--}}
{{--                                            <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>مالك إبل</option>--}}
{{--                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير الموقع</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                    <div class="col-12">
                                        <label class="mb-2">البريد الإلكتروني أو رقم الجوال<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                            <input type="text" name="login" value="{{old('login')}}" class="form-control @error('login') is-invalid @enderror" required>
                                        </div>
                                        @error('login') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-12">
                                        <label class="mb-2">كلمة المرور<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  required>
                                        </div>
                                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="" id="">
                                            <label class="form-check-label" for="remember">تذكرني</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 text-start">
                                        <a href="{{route('password.request')}}" class="text-primary">نسيت كلمة المرور؟</a>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 mt-4">تسجيل الدخول</button>
                                    </div>

                                    <div class="col-sm-6 text-start">
                                        <a href="{{url('/')}}" class="text-primary">رجوع للموقع</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right Side (Welcome Message) -->
                        <div class="col-md-5 pe-0 d-none d-md-block">
                            <div class="form-right h-100 text-white text-center pt-5">
                                <h2 class="fs-1">مرحبًا بعودتك!</h2>
                                <img height="210px" src="{{ asset('logo_bg.png') }}" alt="logo">
                                <h3 class="mb-3 text-center"> ذود - منصة إدارة الإبل</h3>
                               <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                toastr()->error($error);
            @endphp
        @endforeach
    @endif
</script>
</body>
</html>
