<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\hallFrameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecentProjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;




// Home related routes 
Route::get("/", [HomeController::class, 'index'])->name('index');
Route::get("/login", [HomeController::class, 'signin'])->name('login');
Route::get("/register", [HomeController::class, 'signup'])->name('register');
Route::get("/my-profile", [HomeController::class, 'profile'])->name('profile');
Route::get("/explore-course/{id}", [CourseController::class, 'exploreCourse'])->name('exploreCourse');

// for user's course
Route::get("/my-course", [HomeController::class, 'myCourse'])->name('myCourse');



// Admin related routes 
Route::prefix('admin')->group(function () {
    Route::match(["get", "post"], '/login', [AdminController::class, "adminLogin"])->name('adminLogin');
    Route::get('/logout', [AdminController::class, "adminLogout"])->name("adminLogout");


    Route::middleware('auth:admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get("/", 'dashboard')->name('admin.dashboard');
        });

        // Routes for recent project operations
        Route::prefix('recent-project')->group(function () {
            Route::controller(RecentProjectController::class)->group(function () {
                Route::get("/show", 'recent_project')->name('recent_project');
            });
        });

        // Routes for courses operations
        Route::prefix('course')->group(function () {
            Route::controller(CourseController::class)->group(function () {
                Route::get("/insert", 'insertCourse')->name('insertCourse');
                Route::get("/manage", 'manageCourse')->name('manageCourse');
            });
        });

        // Route for hall of frame operations
        Route::prefix('hall-of-frame')->group(function () {
            Route::controller(hallFrameController::class)->group(function () {
                Route::get("/manage", 'manageHallframe')->name('manageHallframe');
                Route::get("/show", 'hallFrame')->name('hallFrame');
            });
        });

        // Route for student operations
        Route::prefix('student')->group(function () {
            Route::controller(StudentController::class)->group(function () {
                Route::get("/insert", 'insertStudent')->name('insertStudent');
                Route::get("/manage", 'manageStudent')->name('manageStudent');
                Route::get("/manage/admission", 'manageAdmission')->name('manageAdmission');
                Route::get("view/{id}", 'viewStudent')->name('viewStudent');
            });
        });

        // Route for category operations
        Route::prefix('category')->group(function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get("/insert", 'insertCategory')->name('insertCategory');
                Route::get("/manage", 'manageCategory')->name('manageCategory');
            });
        });        
    });
});
