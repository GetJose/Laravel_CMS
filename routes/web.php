<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Site\HomeController as SiteHomeController;

Route::get('/', [SiteHomeController::class, 'index']);

Route::prefix('painel')->group(function (){
    Route::get('/',[ AdminHomeController::class ,'index'])->name('painel');

    Route::get('login', [ LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login-action');

    Route::get('register', [ RegisterController::class, 'index'])->name('register');
    Route::post('register', [ RegisterController::class, 'register'])->name('register-action');

    Route::post('logout', [ LoginController::class, 'logout'])->name('logout');
});
