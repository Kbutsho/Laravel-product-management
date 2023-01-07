<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Middleware\ValidAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'ShowLogin'])->name('/login');
Route::post('/login', [LoginController::class, 'Login'])->name('/login');

Route::get('/signup', [SignupController::class, 'ShowSignup'])->name('/signup');
Route::post('/signup', [SignupController::class, 'Signup'])->name('/signup');
Route::get('/', function () {
    return redirect()->route('/login');
});

Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('/dashboard')->middleware([ValidAdmin::class]);
