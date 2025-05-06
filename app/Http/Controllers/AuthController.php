<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Camel;
use App\Models\HealthRecord;
use App\Models\TrackerDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Toastr;

class AuthController extends Controller
{
    public function dashboardAdmin()
    {
        $totalOwners = User::where('role', 'owner')->count();
        $totalDevices = TrackerDevice::count();
        $totalCamels = Camel::count();
        $totalHealthRecords = HealthRecord::count();
        $ownerGrowth = User::where('role', 'owner')
            ->selectRaw("YEAR(registration_date) as year, MONTH(registration_date) as month, COUNT(*) as count")
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        $camelGrowth = Camel::selectRaw("YEAR(date_of_birth) as year, MONTH(date_of_birth) as month, COUNT(*) as count")
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        return view('admin.dashboard', compact('totalOwners', 'totalDevices', 'totalCamels', 'totalHealthRecords', 'ownerGrowth', 'camelGrowth'));
    }

    public function dashboardOwner()
    {
        $ownerId = Auth::id();

        $totalCamels = Camel::where('owner_id', $ownerId)->count();
        $totalHealthAlerts = HealthRecord::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->where('diagnosis', '!=', 'Healthy')->count();
        $camelGrowth = Camel::where('owner_id', $ownerId)
            ->selectRaw("YEAR(date_of_birth) as year, MONTH(date_of_birth) as month, COUNT(*) as count")
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        $healthReports = HealthRecord::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->selectRaw("YEAR(checkup_date) as year, MONTH(checkup_date) as month, COUNT(*) as count")
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        return view('owner.dashboard', compact('totalCamels', 'totalHealthAlerts', 'camelGrowth', 'healthReports'));
    }
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginType => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'owner') {
                return redirect()->route('owner.dashboard');
            } else {
                Auth::logout();
                toastr()->error('نوع الحساب غير مصرح له بالدخول');
                return redirect()->route('login');
            }
        }

        toastr()->error('بيانات الدخول غير صحيحة');
        return back()->withInput($request->only('login'));
    }



    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'national_id' => 'required|digits:10|unique:user,national_id',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email|unique:user,email|max:255',
            'civil_registry' => 'nullable|string|max:20',

            'phone'=> [
                'required',
                'numeric',
                'regex:/^(05\d{8}|\+9665\d{8})$/',
                'unique:user,phone',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@#$%^&*]/',
            ],
        ], [
            'password.regex' => 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل، حرف كبير، حرف صغير، رقم، ورمز خاص (@, #, $, %, &)',
        ]);

        $user = User::create([
            'national_id' => $request->national_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'owner',
            'civil_registry' => $request->civil_registry,

            'registration_date' => now(),
        ]);
        Auth::login($user);

        return redirect()->route('owner.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showProfile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone'=> [
                'required',
                'numeric',
                'regex:/^(05\d{8}|\+9665\d{8})$/',
                'unique:user,phone,' . $user->id,
            ],
            'email' => 'required|email|max:255|unique:user,email,' . $user->id,
            'address' => 'required|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        toastr()->success('تم تحديث الملف الشخصي بنجاح');
        return back();
    }


    public function showUpdatePasswordForm()
    {
        return view('auth.update_password', ['user' => Auth::user()]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@#$%^&*]/',
            ],
        ], [
            'new_password.regex' => 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل، حرف كبير، حرف صغير، رقم، ورمز خاص (@, #, $, %, &)',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            toastr()->error('كلمة المرور الحالية غير صحيحة');
            return back();
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('تم تحديث كلمة المرور بنجاح');
        return back();
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetToken(Request $request)
    {
        $request->validate(['login' => 'required']);

        $user = User::where('email', $request->login)->orWhere('phone', $request->login)->first();

        if (!$user) {
            return back()->withErrors(['login' => 'لا يوجد حساب بهذا البريد الإلكتروني أو رقم الجوال.']);
        }

        $user->update(['token' => rand(1000, 9999)]);

        return redirect()->route('password.reset')->with('success', 'تم إرسال رمز الاستعادة.');
    }

    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'token' => 'required|numeric',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('email', $request->login)->orWhere('phone', $request->login)->first();

        if (!$user || $user->token != $request->token) {
            return back()->withErrors(['token' => 'الرمز غير صحيح.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'token' => null
        ]);

        return redirect()->route('login')->with('success', 'تم تغيير كلمة المرور بنجاح.');
    }
}
