<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [FrontController::class, 'index'])->name('personal');
Route::post('/send', [FrontController::class, 'send'])->name('message.send');
// Route::post('/register', [RegisterController::class, 'register'])->name('register');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/check-access', [HomeController::class, 'rbacCheck'])->name('check-access');
Route::post('/check-access', [HomeController::class, 'chooseRole'])->name('choose-role');
Route::get('/menus', [HomeController::class, 'loadMenu'])->name('load-menu');

// Events
// RAPMAFEST
Route::get('/rapmafest8', [FrontController::class, 'rapmafest8'])->name('front.rapmafest8');
Route::get('/rapmafest9', [FrontController::class, 'rapmafest9'])->name('front.rapmafest9');
Route::get('/rapmafest10', [FrontController::class, 'rapmafest10'])->name('front.rapmafest10');

// RAPMADAY
Route::get('/rapmaday8', [FrontController::class, 'rapmaday8'])->name('front.rapmaday8');
