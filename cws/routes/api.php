<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\CourseApiController;
use App\Http\Controllers\RecentProjectController;
use App\Http\Controllers\HallFrameApiApiController;
use App\Http\Controllers\RecentProjectApiController;
use App\Http\Controllers\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::get('/user-profile', function () {
    return auth()->user();
})->middleware('jwt.auth');



// api for category operations
Route::apiResource('category',CategoryApiController::class);

//api for  Courses operations
Route::apiResource("course",CourseApiController::class);

//api for recent project operations
Route::apiResource("recent_project",RecentProjectApiController::class);

//api for hallframe operations
Route::apiResource("hallFrame",HallFrameApiApiController::class);

// api for student operations
Route::get('/admin/manage-student',[StudentApiController::class,"index"])->name("manage-student");
Route::post('/admin/insert-student', [StudentApiController::class, 'addStudent'])->name("addStudent");
Route::get('/admin/student/view/{id}', [StudentApiController::class, 'show']);
