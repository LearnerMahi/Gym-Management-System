<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
/* use Illuminate\Support\Facades\Mail; */

class ForgetPasswordManager extends Controller
{
    public function forgetPassword()
    {
        return view('forget-password');
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now() // Use Carbon::now() to get the current timestamp
        ]);

       /*  Mail::send("emails.forget-password", ['token' => $token], function ($message) use ($request) {
          $message->to($request->email);
          $message->subject("Reset password please");
      });
       */

        return view("new-password",compact('token'));
    }

    public function resetPassword($token)
    {
        return view("new-password", compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required"
        ]);

        $updatePassword = DB::table('password_resets')->where([
            "email" => $request->email,
            "token" => $request->token
        ])->first();

        if (!$updatePassword) {
            return redirect()->route('reset.password')->with("error", "Invalid token.");
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);
        DB::table('password_resets')->where(["email" => $request->email])->delete();
        return redirect()->route('login')->with("success", "Password reset successfully.");
    }
}
