<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class ChooseController extends Controller
{
    public function choosePost(Request $request)
    {
        $selectedRole = $request->input('role');
        
        if ($selectedRole === 'user') {
            // Logic for user role
            return view('welcome');
        } elseif ($selectedRole === 'admin') {
            // Logic for admin role
            return view('adminlog'); // Assuming your view for admin login is named admin.login.blade.php
        } elseif ($selectedRole === 'trainer') {
            // Logic for trainer role
            return "Selected role is Trainer";
        }
    }
    
    public function adminlogPost(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Retrieve the credentials from the request
    $email = $request->input('email');
    $password = $request->input('password');

    // Retrieve the admin record from the database using the provided email
    $admin = Admin::where('email', $email)->first();

    // Check if an admin with the provided email exists
    if ($admin) {
        // Check if the password is hashed using Bcrypt
        if (password_verify($password, $admin->password) || md5($password) === $admin->password) {
            // Password matches, login successful
            return redirect()->intended(route('adminpage'))->with("success", "Successfully logged in");
        }
    }
    
    

    // Invalid credentials, redirect back to the login page
    return redirect()->route('adminlog')->with("error", "Invalid credentials");
}

}
