<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WasteRecordController;
use Illuminate\Support\Facades\Route;

// Redirect root to dashboard (will trigger auth check)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Protected Waste Management Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [WasteRecordController::class, 'index'])->name('dashboard');

    Route::prefix('records')->name('records.')->group(function () {
        Route::get('/', [WasteRecordController::class, 'index'])->name('index');
        Route::post('/', [WasteRecordController::class, 'store'])->name('store');
        Route::get('/export/csv', [WasteRecordController::class, 'exportCsv'])->name('export');
        Route::put('/{record}', [WasteRecordController::class, 'update'])->name('update');
        Route::delete('/{record}', [WasteRecordController::class, 'destroy'])->name('destroy');
    });
});
