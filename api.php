<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/request-payment', [PaymentController::class, 'requestPayment']);
Route::post('/confirm-payment', [PaymentController::class, 'confirmPayment']);
