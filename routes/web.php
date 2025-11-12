<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // jika sudah login arahkan sesuai role
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role === 'customer') {
            return redirect()->route('customer.dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }

    // jika belum login tampilkan form login (atau view welcome jika kamu mau)
    return view('auth.login');
})->name('root');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'loginProcess'])->name('login.process');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Forgot password (bisa kamu isi nanti)
    Route::get('forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
});


Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('doctors', App\Http\Controllers\Admin\DoctorController::class);
    Route::resource('specializations', App\Http\Controllers\Admin\SpecializationController::class);

    Route::post('specializations/{id}/restore', [App\Http\Controllers\Admin\SpecializationController::class, 'restore'])->name('specializations.restore');
    Route::delete('specializations/{id}/force-delete', [App\Http\Controllers\Admin\SpecializationController::class, 'forceDelete'])->name('specializations.force-delete');
    Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);
});


Route::prefix('doctor')->name('doctor.')->middleware('role:doctor')->group(function () {
    Route::get('dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');


    Route::prefix('schedules')->name('schedules.')->group(function () {
        Route::get('/', [App\Http\Controllers\Doctor\ScheduleController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Doctor\ScheduleController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Doctor\ScheduleController::class, 'store'])->name('store');
        Route::get('/{schedule}/edit', [App\Http\Controllers\Doctor\ScheduleController::class, 'edit'])->name('edit');
        Route::patch('/{schedule}', [App\Http\Controllers\Doctor\ScheduleController::class, 'update'])->name('update');
    });

    // Appointments
    Route::prefix('appointments')->name('appointments.')->group(function () {
        Route::get('/', [App\Http\Controllers\Doctor\AppointmentController::class, 'index'])->name('index');
        Route::get('/queue', [App\Http\Controllers\Doctor\AppointmentController::class, 'queue'])->name('queue');
        Route::get('/{appointment}', [App\Http\Controllers\Doctor\AppointmentController::class, 'show'])->name('show');
        Route::patch('/{appointment}/status', [App\Http\Controllers\Doctor\AppointmentController::class, 'updateStatus'])->name('updateStatus');
    });
});

Route::prefix('staff')->name('staff.')->middleware('role:staff')->group(function () {
    Route::get('dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');

    Route::resource('patients', \App\Http\Controllers\Staff\PatientController::class);
    Route::resource('appointments', \App\Http\Controllers\Staff\AppointmentController::class);
    Route::post('appointments/{appointment}/checkin', [\App\Http\Controllers\Staff\AppointmentController::class, 'checkin'])->name('appointments.checkin');
});
