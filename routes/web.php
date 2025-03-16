<?php

use App\Http\Controllers\ApiDocController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api-doc', [ApiDocController::class, 'index']);
Route::get('/api-doc/yaml', [ApiDocController::class, 'yaml']);