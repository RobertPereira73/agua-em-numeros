<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Authenticate;
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

Route::get('/', function () {
    return redirect()->route('login');
    return view('welcome');
});

Route::prefix('login')->name('login')->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'login']);
});

Route::prefix('register')->name('register')->group(function () {
    Route::get('/', [RegisterController::class, 'index']);
    Route::post('/', [RegisterController::class, 'register']);
});

Route::middleware([Authenticate::class])->group(function () {
    Route::prefix('/dashboard')->name('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
    });

    Route::prefix('/meu-perfil')->name('account')->group(function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::post('/', [AccountController::class, 'update']);
        Route::post('/check-password', [AccountController::class, 'checkPassword'])->name('checkPassword');
    });

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});