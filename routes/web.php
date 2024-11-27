<?php

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
    Route::get('/dashboard', function () {
        return "ok ok ok ok ok test :|";
    })
    ->name('dashboard');

    Route::get('/logout', [LogoutController::class, 'logout']);
});