<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ProfileControler;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserContoller;
use App\Http\Controllers\Site\HomeController as SiteHomeController;

Route::get('/', [SiteHomeController::class, 'index']);

Route::prefix('painel')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login-action');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register-action');

    Route::middleware('auth')->group(function () {

        Route::get('/', [AdminHomeController::class, 'index'])->name('painel');

        Route::get('profile', [ProfileControler::class, 'edit'])->name('profile');
        Route::post('profile', [ProfileControler::class, 'update'])->name('profile-action');

        Route::middleware('can:edit-users')->group(function () {
            Route::resource('users', UserContoller::class);
        });

        Route::get('settings', [SettingController::class, 'index'])->name('settings');
        Route::put('settings\save', [SettingController::class, 'save'])->name('settings.save');
    });
});
