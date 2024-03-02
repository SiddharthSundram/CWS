<?php

use App\Http\Controllers\AdminController;
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
Route::get("/register",[HomeController::class,'signup'])->name('register');

Route::prefix('admin')->group(function(){ 
    Route::get("/dashboard",[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get("/insertCategory",[AdminController::class,'insertCategory'])->name('insertCategory');
    Route::get("/insertCourse",[AdminController::class,'insertCourse'])->name('insertCourse');
    Route::get("/manageCourse",[AdminController::class,'manageCourse'])->name('manageCourse');
    Route::get("/recent_project",[AdminController::class,'recent_project'])->name('recent_project');
    Route::get("/manageCategory",[AdminController::class,'manageCategory'])->name('manageCategory');
    Route::get("/hallFrame",[AdminController::class,'hallFrame'])->name('hallFrame');
});