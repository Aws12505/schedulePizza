<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::middleware(['excel_secret'])->group(function () {
Route::post('/employees', [EmployeeController::class, 'store']);
});