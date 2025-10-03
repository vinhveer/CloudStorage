<?php

use Illuminate\Support\Facades\Route;

Route::get('/sample', [App\Http\Controllers\SampleController::class, 'index']);

Route::get('/navigation', function () {
    return view('sample.navigation');
});

Route::get('/form', function () {
    return view('sample.form');
});
