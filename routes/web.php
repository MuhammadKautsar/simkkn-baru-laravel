<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KknController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\Kkn;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/tables', function () {
    return view('tables');
})->name('tables');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/beranda', [MahasiswaController::class, 'index'])->name('beranda');
Route::get('/daftar', [MahasiswaController::class, 'create'])->name('daftar');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

// Route::get('/sign-up', [RegisterController::class, 'create'])
//     ->middleware('guest')
//     ->name('sign-up');

Route::get('/tes', [LoginController::class, 'testConnection'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'login'])
    ->middleware('guest');

Route::get('panitia/sign-in', [LoginController::class, 'panitia_index'])
    ->middleware('guest')
    ->name('panitia-sign-in');

Route::post('panitia/sign-in', [LoginController::class, 'panitia_login'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Route::get('/dashboard', [KknController::class, 'index'])->name('dashboard')->middleware('auth:web,puksi');
Route::get('/dashboard', [KknController::class, 'index'])->name('dashboard');
Route::get('/kkn/create', [KknController::class, 'create'])->name('kkn.create');
Route::post('/kkn', [KknController::class, 'store'])->name('kkn.store');

Route::get('/jenis-kkn', [KknController::class, 'jenis_kkn'])->name('jenis.kkn');
Route::post('/jenis-kkn-add', [KknController::class, 'add_jenis_kkn'])->name('jenis-kkn.add');

// Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
//     ->middleware('guest')
//     ->name('password.request');

// Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
//     ->middleware('guest')
//     ->name('password.email');

// Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
//     ->middleware('guest')
//     ->name('password.reset');

// Route::post('/reset-password', [ResetPasswordController::class, 'store'])
//     ->middleware('guest');

Route::get('/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');

Route::get('/users-management', [UserController::class, 'index'])->name('users-management');
Route::post('/users-management/store', [UserController::class, 'store'])->name('users-management.store');
