<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::as('leads.')->group(function () {
    Route::get('/', [LeadController::class, 'index'])->name('index');
    Route::post('/store', [LeadController::class, 'store'])->name('store');
});
