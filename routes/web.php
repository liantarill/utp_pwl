<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;

use App\Http\Controllers\Auth\LoginController;
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
    Route::resource('staff', App\Http\Controllers\Admin\StaffController::class);
});


Route::prefix('doctor')->name('doctor.')->middleware('role:doctor')->group(function () {
    Route::get('dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('staff')->name('staff.')->middleware('role:staff')->group(function () {
    Route::get('dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
});