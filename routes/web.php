<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;

Route::get('/', [FrontController::class, 'index'])->name('personal');
Route::post('/send', [FrontController::class, 'send'])->name('message.send');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/check-access', [HomeController::class, 'rbacCheck'])->name('check-access');
Route::post('/check-access', [HomeController::class, 'chooseRole'])->name('choose-role');
Route::get('/menus', [HomeController::class, 'loadMenu'])->name('load-menu');
