<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::view('login', 'login');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::view('register', 'register');
Route::post('register', [AuthController::class, 'register'])->name('register');