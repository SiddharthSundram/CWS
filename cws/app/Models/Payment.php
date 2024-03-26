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
            if ($payment->status == 0) {
                $course = $payment->course;
                $totalDurationInWeeks = $course->duration; // Assuming duration is in weeks

                if ($totalDurationInWeeks > 0) {
                    // Calculate the due date for each payment
                    $paymentDate = Carbon::parse($payment->date_of_payment);
                    $percentages = [40, 70, 100]; // Payment percentages
                    $dueDate = $paymentDate->copy()->addWeeks(floor($totalDurationInWeeks * ($percentages[$payment->payment_number] / 100)));

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
