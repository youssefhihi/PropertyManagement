<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
//register
Route::get('register', [RegisterController::class, 'create'])->name('register');        
Route::post('register', [RegisterController::class, 'store']);
//login
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('login', [LoginController::class, 'create'])->name('login');        


Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
      //properties routes
    Route::resource('properties', PropertyController::class);
});