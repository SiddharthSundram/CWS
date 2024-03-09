<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\CourseApiController;
use App\Http\Controllers\RecentProjectController;
use App\Http\Controllers\HallFrameApiApiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RecentProjectApiController;
use App\Http\Controllers\SearchApiController;
use App\Http\Controllers\StudentApiController;
use App\Http\Controllers\StudentCourseController;

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
        $id = auth()->id();
        $controller = app()->make('App\Http\Controllers\StudentApiController');
        return $controller->show($id);
    })->middleware('jwt.auth')->name("my-profile");



// api for category operations
Route::apiResource('category',CategoryApiController::class);

//api for  Courses operations
Route::apiResource("course",CourseApiController::class);

//api for recent project operations
Route::apiResource("recent_project",RecentProjectApiController::class);

//api for hallframe operations
Route::apiResource("hallFrame",HallFrameApiApiController::class);


// api for student course table 
Route::apiResource("student_course", StudentCourseController::class);


// api for student operations
Route::get('/admin/manage-student',[StudentApiController::class,"index"])->name("manage-student");
Route::get('/admin/manage-payments',[PaymentController::class,"managePaymentsApi"])->name("manage-payments");
Route::get('/admin/manage-admission',[StudentApiController::class,"manageAdmission"])->name("manage-admission");
Route::post('/admin/insert-student', [StudentApiController::class, 'addStudent'])->name("addStudent");
Route::get('/admin/student/view/{id}', [StudentApiController::class, 'show']);
Route::post('/admin/student/edit/{id}', [StudentApiController::class, 'update']);
Route::get('/admin/student/count', [StudentApiController::class, 'count'])->name("student_count");
Route::delete('/admin/student/{id}', [StudentApiController::class, 'destroy'])->name('admin.student.delete');

// Route for student Course Operation
Route::post('/admin/student-course', [StudentCourseController::class, 'store']);
Route::get('/admin/student-course/view', [StudentCourseController::class, 'index']);

// for search 

// for payment
Route::post('/admin/student/payment', [PaymentController::class, 'addPayment']);

Route::patch('/admin/student/payment/{paymentId}/mark-as-paid', [PaymentController::class, 'markAsPaid']);
