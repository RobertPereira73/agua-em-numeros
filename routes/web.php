<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RepositoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\NotLogged;
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

Route::middleware([NotLogged::class])->group(function () {
    Route::prefix('login')->name('login')->group(function () {
        Route::get('/', [LoginController::class, 'index']);
        Route::post('/', [LoginController::class, 'login']);
    });
    
    Route::prefix('register')->name('register')->group(function () {
        Route::get('/', [RegisterController::class, 'index']);
        Route::post('/', [RegisterController::class, 'register']);
    });
});


Route::middleware([Authenticate::class])->group(function () {
    Route::prefix('/dashboard')->name('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::post('/counts', [DashboardController::class, 'counts'])->name('.counts');
        Route::post('/line-chart', [DashboardController::class, 'lineChart'])->name('.lineChart');
        Route::post('/pie-chart', [DashboardController::class, 'pieChart'])->name('.pieChart');
        Route::post('/bar-chart', [DashboardController::class, 'barChart'])->name('.barChart');
    });

    Route::prefix('/users')->name('users')->group(function () {
        Route::get('/', [UsersController::class, 'index']);
    });

    Route::prefix('/repositories')->name('repositories')->group(function () {
        Route::get('/', [RepositoriesController::class, 'index']);
        Route::post('/search', [RepositoriesController::class, 'search'])->name('.search');
        Route::post('/', [RepositoriesController::class, 'store'])->name('.store');
        Route::delete('/delete-repository/{id}', [RepositoriesController::class, 'delete'])->name('.delete');
    });

    Route::prefix('/meu-perfil')->name('account')->group(function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::post('/', [AccountController::class, 'update']);
        Route::post('/check-password', [AccountController::class, 'checkPassword'])->name('checkPassword');
    });

    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});