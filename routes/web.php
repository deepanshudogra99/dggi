<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\MasterController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/masters/statemaster',[MasterController::class,'statemaster'])->name('statemaster');
});
