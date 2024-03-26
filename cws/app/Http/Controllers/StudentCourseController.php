<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $courses = StudentCourse::where('user_id', $user->id)->get();

        return response()->json(['courses' => $courses]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $courseId = $request->input('course_id');
        $userId = $request->input('user_id');

        // Check if the record already exists
        if (StudentCourse::where('course_id', $courseId)->where('user_id', $userId)->exists()) {
            return response()->json([
                'msg' => 'Student Course already exists',
            ], 400);
        }

        $data = StudentCourse::create($validator->validated());

        return response()->json([
            'msg' => 'Student Course added successfully',
            'data' => $data
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentCourse $studentCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId, $courseId)
    {
        $studentCourse = StudentCourse::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->first();

        if (!$studentCourse) {
            return response()->json(['message' => 'Student course not found.'], 404);
        }
        $payments = Payment::where([['course_id', $studentCourse->course_id], ['user_id', $studentCourse->user_id]])->get();
       
        if($payments){
            foreach ($payments as $payment) {
                $payment->delete();
            }
        }
        $studentCourse->delete();

        return response()->json(['message' => 'Student course deleted successfully.']);
    }

}
