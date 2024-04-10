<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KknController;
use App\Http\Controllers\MhsKknController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('auth');

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

// Route::get('/beranda', function () {
//     return view('beranda');
// })->name('beranda')->middleware('auth');

Route::get('/beranda', [MhsKknController::class, 'index'])->name('beranda')->middleware('auth');
Route::get('/daftar', [MhsKknController::class, 'create'])->name('daftar')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

// Route::get('/signin', function () {
//     return view('account-pages.signin');
// })->name('signin');

// Route::get('/signup', function () {
//     return view('account-pages.signup');
// })->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

// Route::post('/sign-up', [RegisterController::class, 'store'])
//     ->middleware('guest');

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

Route::get('/dashboard', [KknController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/kkn/create', [KknController::class, 'create'])->name('kkn.create')->middleware('auth');
Route::post('/kkn', [KknController::class, 'store'])->name('kkn.store')->middleware('auth');

Route::get('/jenis-kkn', [KknController::class, 'jenis_kkn'])->name('jenis.kkn')->middleware('auth');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');

Route::get('/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');
