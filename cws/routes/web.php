<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get("/",[HomeController::class,'index'])->name('index');
Route::get("/login",[HomeController::class,'signin'])->name('login');
Route::get("/logout",[HomeController::class,'signout'])->name('logout');
Route::get("/register",[HomeController::class,'signup'])->name('register');

Route::get("/dashboard",[HomeController::class,'dashboard'])->name('admin.dashboard');