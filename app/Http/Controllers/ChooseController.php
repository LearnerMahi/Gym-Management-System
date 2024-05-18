<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Trainer;
use App\Models\User;

class ChooseController extends Controller
{
    public function choosePost(Request $request)
    {
        $selectedRole = $request->input('role');
        
        if ($selectedRole === 'user') {
            
            
            return redirect(route('login'));
            
        } elseif ($selectedRole === 'admin') {
            
            return redirect()->route('adminlog');

        } elseif ($selectedRole === 'trainer') {
           
            return view('trainer');
        }
    }

    public function adminlogPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $email = $request->input('email');
        $password = $request->input('password');
    
        $admin = Admin::where('email', $email)->first();
    
        if ($admin && (password_verify($password, $admin->password) || md5($password) === $admin->password)) {
            $trainers = Trainer::all();
            $count = Trainer::count();
            $count1 = User::count();  // Assuming User is your model for gym members
            return view('adminpage', compact('trainers', 'count', 'count1'));
        }
    
        return redirect()->route('adminlog')->with("error", "Invalid credentials");
    }
    

    public function tradele($id)
    {
        $trainer = Trainer::find($id);
    
       
        if (!$trainer) {
            return redirect()->route('adminpage')->with("error", "Trainer not found");
        }
    
       
        $trainer->delete();
    
     
        $trainers = Trainer::all();
        
            $count = Trainer::count();
            $count1 = User::count();
            return view('adminpage', compact('trainers', 'count', 'count1'));
    }
    
}
    



    

    