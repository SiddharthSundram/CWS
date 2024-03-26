<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            if (!$payment->is_fullPayment) {
                $course = $payment->course;
                $totalDurationInWeeks = $course->duration; // Assuming duration is in weeks

                if ($totalDurationInWeeks > 0) {
                    // Calculate the due date for each payment
                    $paymentDate = Carbon::parse($payment->date_of_payment);

                    if ($payment->payment_number == 0) {
                        // First payment due today
                        $dueDate = $paymentDate;
                    } elseif ($payment->payment_number == 1) {
                        // Second payment due at mid of the course duration
                        $midDuration = ceil($totalDurationInWeeks / 2);
                        $dueDate = $paymentDate->copy()->addWeeks($midDuration);
                    } elseif ($payment->payment_number == 2) {
                        // Third payment due at the end of the course duration
                        $dueDate = $paymentDate->copy()->addWeeks($totalDurationInWeeks);
                    }

                    $payment->due_date = $dueDate;
                }
            }
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
