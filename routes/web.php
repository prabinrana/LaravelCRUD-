<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/custom-sign-in',[AuthController::class,'createSignin'])->name('signin.custom');


Route::get('/register',[AuthController::class,'signup'])->name('register');
Route::post('/create-user',[AuthController::class,'customSignup'])->name('user.registration');

Route::get('/dashboard',[AuthController::class,'dashboardView'])->name('dashboard');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('products', ProductController::class);

Route::view('/','welcome');


