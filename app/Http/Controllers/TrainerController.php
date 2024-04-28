<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class TrainerController extends Controller
{
    function regtrainer(){
        if(Auth::check()){
            return redirect(route('thome'));
        }
        return view('regtrainer');
    }
    function regtrainerpost(Request $request)
    {
        // Validate the form data
        $trainer = null;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:trainer,email',
            'password' => 'required',
            'terms_accepted' => 'required', // Add validation for terms_accepted
            // Add validation rules for other fields here
        ]);
    
        // Prepare data for creating a new Trainer record
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_number' => $request->contact_number,
            'address' => $request->address,
            'bio' => $request->bio,
            'specialization' => $request->specialization,
            'certifications' => $request->certifications,
            'gym_affiliation' => $request->gym_affiliation,
            'gym_membership_id' => $request->gym_membership_id,
            'certification_proof' => $request->certification_proof,
            'background_check_document' => $request->background_check_document,
            'terms_accepted' => $request->terms_accepted, // Ensure terms_accepted is properly set to true or false
        ];
    
        // Create a new Trainer record
        if($request->terms_accepted=='1'){
        
        $trainer = Trainer::create($data);
        }
    
        // Check if the Trainer record was successfully created
        if (!$trainer) {
            return redirect(route('trainer'))->with("error", "Registration failed, please try again");
        }
    
        // Redirect to the login page with a success message
        return redirect(route('logtrainer'))->with("success", "Registered successfully");
    }
    
    
    function logtrainer(){
       
        return view('trainerlogin');
    }
    
    function logtrainerpost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt authentication using the 'trainer' guard
        if (Auth::guard('trainer')->attempt($credentials)) {
            return redirect()->intended(route('thome'))->with("success", "Successfully logged in");
        }

        return redirect()->route('logtrainer')->with("error", "Invalid credentials");
    }
 

}
