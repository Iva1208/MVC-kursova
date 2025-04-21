<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\RegisterController;

// Начална страница
Route::get('/', function () {
    return view('welcome');
});

// Laravel auth (включва login, logout, reset и т.н.)
Auth::routes();

// След логин
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Регистрация с персонализиран контролер
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Всички routes за книги, защитени с auth middleware
Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
});
