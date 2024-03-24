<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::as('leads.')->group(function () {
    Route::get('/', [LeadController::class, 'index'])->name('index');
    Route::get('/{lead_id}/editCost', [LeadController::class, 'editCost'])->name('editCost');
    Route::get('/{lead_id}/editPrice', [LeadController::class, 'editPrice'])->name('editPrice');
    Route::post('/store', [LeadController::class, 'store'])->name('store');
    Route::put('/{lead_id}/addCost', [LeadController::class, 'updateCost'])->name('updateCost');
    Route::put('/{lead}/addPrice', [LeadController::class, 'updatePrice'])->name('updatePrice');
    Route::get('/leads/seed', [LeadController::class, 'seed'])->name('seed');
});
