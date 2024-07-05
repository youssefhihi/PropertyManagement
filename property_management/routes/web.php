<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function () {

//register
Route::get('/register', [RegisterController::class, 'create'])->name('register');        
Route::post('register', [RegisterController::class, 'store']);
//login
Route::post('/login', [LoginController::class, 'login']);
Route::get('login', [LoginController::class, 'create'])->name('login'); 
});       

Route::get('/home', [UserController::class, 'index'])->name('home.index');        
Route::get('/home/filter', [UserController::class, 'filter'])->name('filter');        
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth','role:admin'])->prefix('/dashboard')->group(function () {
    
        //properties routes
    Route::resource('/properties', PropertyController::class);
        //owners routes
    Route::resource('owners', OwnerController::class);
        //tenants routes
    Route::resource('/tenants', TenantController::class);

});