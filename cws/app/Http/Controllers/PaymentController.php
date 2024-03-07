<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
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

        if ($paymentType == 'full') {
            // Create a record for full payment
            $data = Payment::create([
                'course_id' => $courseId,
                'user_id' => $userId,
                'fees' => $fees,
            ]);
        } else {
            // Calculate the partial payments
            $paymentAmounts = [0.4, 0.3, 0.3];
            $totalPaymentAmount = $fees;

            foreach ($paymentAmounts as $paymentAmount) {
                $data = Payment::create([
                    'course_id' => $courseId,
                    'user_id' => $userId,
                    'fees' => $paymentAmount * $totalPaymentAmount,
                ]);
            }
        }

        return response()->json([
            'msg' => 'Payment(s) added successfully',
            'data' => $data
        ], 201);
    }

    public function checkPaymentStatus(Request $request)
    {
        try {
            $userId = $request->input('user_id');
            $payment = Payment::where('user_id', $userId)->first();

            if ($payment) {
                return response()->json(['status' => $payment->status]);
            } else {
                return response()->json(['status' => 0]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while checking payment status'], 500);
        }
    }
}
