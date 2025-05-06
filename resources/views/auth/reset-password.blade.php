<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>إعادة تعيين كلمة المرور - ذود</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }
        .reset-password-page { height: 100vh; display: flex; align-items: center; justify-content: center; }
        .btn-primary { background-color: #af9072; border-color: #af9072; }
        .btn-primary:hover { background-color: #906338; border-color: #906338; }
    </style>
</head>
<body>

<div class="reset-password-page bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-white shadow rounded p-4">
                    <h3 class="mb-4 text-center">إعادة تعيين كلمة المرور</h3>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-2">البريد الإلكتروني أو رقم الجوال<span class="text-danger">*</span></label>
                            <input type="text" name="login" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">رمز التحقق<span class="text-danger">*</span></label>
                            <input type="text" name="token" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">كلمة المرور الجديدة<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">تأكيد كلمة المرور<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">تحديث كلمة المرور</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-primary">العودة إلى تسجيل الدخول</a>
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
