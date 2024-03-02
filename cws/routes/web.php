<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get("/",[HomeController::class,'index'])->name('index');
Route::get("/login",[HomeController::class,'signin'])->name('login');
Route::get("/register",[HomeController::class,'signup'])->name('register');

Route::get("/my-profile",[HomeController::class,'profile'])->name('profile');


// Route::prefix('admin')->group(function(){ 
    // Route::get("/dashboard",[AdminController::class,'dashboard'])->name('admin.dashboard');
    // Route::get("/insertCategory",[AdminController::class,'insertCategory'])->name('insertCategory');
    // Route::get("/insertCourse",[AdminController::class,'insertCourse'])->name('insertCourse');
    // Route::get("/manageCourse",[AdminController::class,'manageCourse'])->name('manageCourse');
    // Route::get("/recent_project",[AdminController::class,'recent_project'])->name('recent_project');
    // Route::get("/manageCategory",[AdminController::class,'manageCategory'])->name('manageCategory');
// });

Route::prefix('admin')->group(function(){
    Route::match(["get","post"],'/login', [AdminController::class,"adminLogin"])->name('adminLogin');
    Route::get('/logout',[AdminController::class,"adminLogout"])->name("adminLogout");

    Route::middleware('auth:admin')->group(function(){
        Route::controller(AdminController::class)->group(function(){
            Route::get("/",'dashboard')->name('admin.dashboard');
            Route::get("/insertCategory",'insertCategory')->name('insertCategory');
            Route::get("/insertCourse",'insertCourse')->name('insertCourse');
            Route::get("/manageCourse",'manageCourse')->name('manageCourse');
            Route::get("/recent_project",'recent_project')->name('recent_project');
            Route::get("/manageCategory",'manageCategory')->name('manageCategory');
            Route::get("/hallFrame",'hallFrame')->name('hallFrame');
        });
    });
});
