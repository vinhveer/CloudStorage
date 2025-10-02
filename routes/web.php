<?php

use Illuminate\Support\Facades\Route;

Route::get('/sample', [App\Http\Controllers\SampleController::class, 'index']);
