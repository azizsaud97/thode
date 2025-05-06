<?php
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\TrackerDeviceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Owner\CamelController;
use App\Http\Controllers\Owner\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::get('/how_it_works', [FrontController::class, 'howItWorks'])->name('how_it_works');
Route::get('/joining', [FrontController::class, 'joining'])->name('joining');


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [AuthController::class, 'sendResetToken'])->name('password.email');

Route::get('reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/my_profile', [AuthController::class, 'showProfile'])->name('my_profile');
    Route::post('/my_profile', [AuthController::class, 'updateProfile'])->name('update_profile');
    Route::get('update_password', [AuthController::class, 'showUpdatePasswordForm'])->name('update_password_form');
    Route::post('update_password', [AuthController::class, 'updatePassword'])->name('update_password');

    Route::prefix('owner')->name('owner.')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboardOwner'])->name('dashboard');
        Route::resource('camels', CamelController::class);
        Route::resource('health_records', App\Http\Controllers\Owner\HealthRecordController::class);
        Route::resource('breeding_records', App\Http\Controllers\Owner\BreedingRecordController::class);
        Route::get('track_devices', [CamelController::class, 'camelsDevices'])->name('track_devices');
        Route::get('track_camels', [CamelController::class, 'trackCamels'])->name('track_camels');
        Route::get('track_camels/data', [CamelController::class, 'trackCamelsData'])->name('track_camels.data');

        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/health', [ReportController::class, 'healthReport'])->name('reports.health');
        Route::get('/reports/breeding', [ReportController::class, 'breedingReport'])->name('reports.breeding');
        Route::get('/reports/tracker', [ReportController::class, 'trackerReport'])->name('reports.tracker');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboardAdmin'])->name('dashboard');
        Route::get('owners', [OwnerController::class, 'index'])->name('owners.index');
        Route::get('owners/{id}', [OwnerController::class, 'show'])->name('owners.show');
        Route::get('camels', [OwnerController::class, 'listCamels'])->name('camels.index');
        Route::resource('tracker_devices', TrackerDeviceController::class)->names('tracker_devices');


    });
});
