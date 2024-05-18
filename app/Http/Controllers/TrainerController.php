<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
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
            'terms_accepted' => 'required', 
            'contact_number' => ['required', 'regex:/^01[0-9]{9}$/'],
            // Add validation for terms_accepted
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
            $trainer = Auth::guard('trainer')->user();
            return redirect()->route('thome')->with("success", "Successfully logged in");
        }

        return redirect()->route('logtrainer')->with("error", "Invalid credentials");
    }
    public function update(Request $request, $id)
    {
        try {
            // Find the trainer record
            $trainer = Trainer::findOrFail($id);

            // Prepare the data to update
            $dataToUpdate = [];

            // Check if each field exists in the request and add it to the data to update
            foreach ($trainer->getFillableForUpdates() as $field) {
                if ($request->has($field)) {
                    $dataToUpdate[$field] = $request->input($field);
                }
            }

            // Log the data that will be updated
            Log::info('Updating trainer with data:', $dataToUpdate);

            // Update the trainer record with the provided data
            $trainer->update($dataToUpdate);

            return redirect()->route('thome')->with('success', 'Trainer information updated successfully.');
        } catch (\Exception $e) {
            // Log the specific error message
            Log::error('Error updating trainer information: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating trainer information. Please try again.');
        }
    }
    
    public function list(Request $request)
{
    $query = $request->input('query', ''); // Get the query from the request or initialize it as an empty string
    $trainer = Trainer::query()
                        ->where('name', 'LIKE', "%$query%")
                        ->orWhere('email', 'LIKE', "%$query%")
                        ->get();

    return view('welcome', ['trainer' => $trainer, 'query' => $query]); // Pass $trainers and $query to the view
}

    

    }
    
    
    




