<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminResultController;
use App\Http\Controllers\Admin\SelfCareController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', function () {

    return view('welcome');
});

// PETUNJUK
Route::get('/petunjuk', function () {

    return view('test.petunjuk');
});

// TEST
Route::get('/tes/{step}', [TestController::class, 'index']);

Route::post('/tes/{step}', [TestController::class, 'submit'])
    ->name('tes.submit');

// HASIL
Route::get('/hasil', [TestController::class, 'hasil']);

Route::get('/hasil/{id}', [TestController::class, 'detailHasil']);

Route::get('/self-care/{id}', [TestController::class, 'selfCareDetail']);

/*
|--------------------------------------------------------------------------
| USER AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // RIWAYAT
    Route::get('/riwayat', [TestController::class, 'riwayat']);

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'index']);

    Route::put('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        // DASHBOARD
        Route::get('/', [AdminDashboardController::class, 'index']);

        // DATA RIWAYAT
        Route::get('/results', [AdminResultController::class, 'index']);

        // DETAIL HASIL
        Route::get('/results/{id}', [AdminResultController::class, 'show']);

        // SELF CARE CRUD
        Route::resource('self-care', SelfCareController::class);
    });

Route::middleware('guest')->group(function () {

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'store'])
        ->name('password.update');
});
