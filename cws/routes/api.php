<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RecentProjectController;


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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
Route::post('/refresh', [AuthController::class, 'refresh']);
// Route::get('/user-profile', [AuthController::class, 'userProfile']);    

Route::get('/user-profile', function () {
    return auth()->user();
})->middleware('jwt.auth');
//api for insert category
Route::apiResource('category',CategoriesController::class);

//api for insert Courses
Route::apiResource("course",CourseController::class);
Route::apiResource("recent_project",RecentProjectController::class);
