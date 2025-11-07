<?php

use App\Http\Controllers\Admin\DashboardController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// Route::prefix('doctor')->name('doctor.')->middleware('role:doctor')->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

// Route::prefix('staff')->name('staff.')->middleware('role:staff')->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
