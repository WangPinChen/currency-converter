<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

Route::post('/currency/convert', [CurrencyController::class, 'convert']);