<?php

use App\Http\Controllers\ImpersonateController;

Route::get('/start/{id}', [ImpersonateController::class, 'start'])->name('impersonate.start');
Route::get('/stop', [ImpersonateController::class, 'stop'])->name('impersonate.stop');
