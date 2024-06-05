<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistrationController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::get('/register/success/{link}', [DashboardController::class, 'showSuccessPage'])->name('registration.success');
Route::get('/access/{link}', [DashboardController::class, 'accessPage'])->name('access.page');
Route::post('/access/{link}/generate-new-link', [DashboardController::class, 'generateNewLink'])->name('generate.new.link');
Route::post('/access/{link}/deactivate-link', [DashboardController::class, 'deactivateLink'])->name('deactivate.link');
Route::post('/access/{link}/imfeelinglucky', [DashboardController::class, 'imFeelingLucky'])->name('imfeelinglucky');
Route::get('/access/{link}/history', [DashboardController::class, 'showHistory'])->name('history');
