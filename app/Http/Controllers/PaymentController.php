<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Store a newly created payment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'last_payment_date' => 'required|date',
            'mobile_number' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|in:male,female',
            'method' => 'required|in:bkash,cash',
            'status' => 'boolean',
        ]);

        // Create a new Payment instance
        Payment::create([
            'status' => 1, 
            'user_id' => $request->user()->id,
            'last_payment_date' => $request->last_payment_date,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'gender' => $request->gender,
            'method' => $request->method,
            'status' => $request->has('status'),
        ]);

        // Redirect back to the form with a success message
        return redirect()->route('profile')->with('success', 'Payment created successfully.');
    }
}
