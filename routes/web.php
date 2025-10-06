<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome.welcome');
});

Route::get('/home', function () {
    return view('home.dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings/name', [SettingsController::class, 'updateName'])->name('settings.name');
    Route::put('/settings/email', [SettingsController::class, 'updateEmail'])->name('settings.email');
    Route::put('/settings/password', [SettingsController::class, 'updatePassword'])->name('settings.password');
});

require __DIR__.'/auth.php';
