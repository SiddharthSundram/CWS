<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });


Route::get("/",[HomeController::class,'index'])->name('index');
Route::get("/login",[HomeController::class,'signin'])->name('login');
Route::get("/logout",[HomeController::class,'signout'])->name('logout');
Route::get("/register",[HomeController::class,'signup'])->name('register');


Route::get("/insertCategory",[HomeController::class,'insertCategory'])->name('insertCategory');
Route::get("/insertCourse",[HomeController::class,'insertCourse'])->name('insertCourse');
Route::get("/recent_project",[HomeController::class,'recent_project'])->name('recent_project');




Route::get("/dashboard",[HomeController::class,'dashboard'])->name('admin.dashboard');