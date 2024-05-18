<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Payment;
use Carbon\Carbon;

class CheckPaymentStatus
{
    // This method is called on each request and it performs the check on payment statuses
    public function handle($request, Closure $next)
    {
        // Retrieve all payments from the database
        $payments = Payment::all();

        // Loop through each payment
        foreach ($payments as $payment) {
            // Convert the last payment date to UTC timezone
            $lastPaymentDate = $payment->last_payment_date->setTimezone('UTC');

            // Output the last payment date for debugging purposes
            //dump($lastPaymentDate);

            // Check if the last payment date is more than 2 minutes ago in UTC timezone
            if ($lastPaymentDate->diffInMinutes(Carbon::now('UTC')) >= 2) {
                // If the condition is met, update the payment status to 0 (presumably meaning inactive or expired)
                $payment->update(['status' => 0]);
            }
        }

        // Proceed with the next middleware or request handler
        return $next($request);
    }
}
