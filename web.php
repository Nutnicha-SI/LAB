<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;

Route::get('/main', function () {
    return view('layouts.main'); // เปลี่ยนจาก view('main') เป็น view('layouts.main')
});

Route::get('/example-01-form', [CalculationController::class, 'showForm'])->name('example-01-form');
Route::post('/example-01-result', [CalculationController::class, 'showResult'])->name('example-01-result');

Route::get('/area-form', [CalculationController::class, 'showareaForm'])->name('area-form');
Route::post('/area-result', [CalculationController::class, 'showareaResult'])->name('area-result');

Route::get('/payment-form', [CalculationController::class, 'showpaymentForm'])->name('payment-form');
Route::post('/payment-result', [CalculationController::class, 'showpaymentResult'])->name('payment-result');

Route::get('/mul-form', [CalculationController::class, 'showmulForm'])->name('mul-form');
Route::post('/mul-result', [CalculationController::class, 'showmulResult'])->name('mul-result');




