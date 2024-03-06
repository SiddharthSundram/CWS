<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\StudentCourse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function addPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'user_id' => 'required',
            'fees' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
    
        $courseId = $request->input('course_id');
        $userId = $request->input('user_id');
        $fees = $request->input('fees');
    
        // Check if the record already exists
        if (StudentCourse::where('course_id', $courseId)->where('user_id', $userId)->where('fees',$fees)->exists()) {
            return response()->json([
                'msg' => 'Student Course already exists',
            ], 400);
        }
    
        $data = Payment::create($validator->validated());
    
        return response()->json([
            'msg' => 'Payment Done successfully',
            'data' => $data
        ], 201);
    }
}
