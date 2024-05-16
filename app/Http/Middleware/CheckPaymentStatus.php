<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Payment;
use Carbon\Carbon;

class CheckPaymentStatus
{
    public function handle($request, Closure $next)
    {
        // Get all payments
        $payments = Payment::all();

        // Iterate through payments
        foreach ($payments as $payment) {
            // Convert last payment date to UTC timezone
            $lastPaymentDate = $payment->last_payment_date->setTimezone('UTC');

            // Dump the last payment date
            dump($lastPaymentDate);

            // Check if last payment date is more than 2 minutes ago in UTC timezone
            if ($lastPaymentDate->diffInMinutes(Carbon::now('UTC')) >= 2) {
                // Update payment status to 0
                $payment->update(['status' => 0]);
            }
        }

        return $next($request);
    }
}
