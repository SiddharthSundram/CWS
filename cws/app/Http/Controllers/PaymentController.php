<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use App\Models\StudentCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function addPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'user_id' => 'required',
            'fees' => 'required',
            'payment_type' => 'required|in:full,partial',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
    
        $courseId = $request->input('course_id');
        $userId = $request->input('user_id');
        $fees = $request->input('fees');
        $paymentType = $request->input('payment_type');
    
        if (Payment::where('course_id', $courseId)->where('user_id', $userId)->exists()) {
            return response()->json([
                'msg' => 'Payment already exists',
            ], 400);
        }
    
        // Get course start date and duration
        $course = Course::findOrFail($courseId);
        $courseStartDate = $course->start_date;
        $courseDuration = $course->duration; // Assuming duration is in days
    
        if ($paymentType == 'full') {
            // Create a record for full payment
            $data = Payment::create([
                'course_id' => $courseId,
                'user_id' => $userId,
                'fees' => $fees,
                'due_date' => Carbon::parse($courseStartDate)->addDays($courseDuration), // Calculate due date
            ]);
        } else {
            // Calculate the partial payments
            $paymentAmounts = [0.4, 0.3, 0.3];
            $totalPaymentAmount = $fees;
            $payment_number = 0;
            foreach ($paymentAmounts as $paymentAmount) {
                $data = Payment::create([
                    'course_id' => $courseId,
                    'user_id' => $userId,
                    'fees' => $paymentAmount * $totalPaymentAmount,
                    'payment_number' => $payment_number,
                    'due_date' => Carbon::parse($courseStartDate)->addDays($courseDuration), // Calculate due date
                ]);

                $payment_number++;
            }
        }
    
        return response()->json([
            'msg' => 'Payment(s) added successfully',
            'data' => $data
        ], 201);
    }
    

    public function managePaymentsApi(Request $request){
        $query = $request->get('query');
        $perPage = $request->input('per_page', 10); // Default to 4 items per page if not specified
        
        if ($query) {
            $payments = Payment::where('name', 'LIKE', "%$query%")->with("course","user")->paginate($perPage);
        } else {
            $payments = Payment::with("course","user")->paginate($perPage);
        }
        return response()->json($payments);
    }
    public function managePayments(Request $request){
        return view("admin.managePayments");
    }

    public function markAsPaid(Request $request, $paymentId)
{
    $payment = Payment::findOrFail($paymentId);
    $payment->status = 1;
    $payment->date_of_payment = now(); // Use now() to get the current date and time
    $payment->save();


    return response()->json(['message' => 'Payment marked as paid']);
}
}
