<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    //


    public function AdminLoginPage() {

        return view('admin-login'); 
        
    }



    
    public function AdminLogin(Request $request) {
        $incomingFields = $request->validate([
            'email_address' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email_address' => $incomingFields['email_address'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();

            $logged_user        =   Auth::user();

            $last_online_time   =   $logged_user->last_online_time;
            $last_online_time   =   Carbon::parse($last_online_time)->format('h:i A - l, F j, Y');

            
            
            /*
            $last_online_time   =   Carbon::parse($last_online_time);
            $last_online_time   =   $last_online_time->diffForHumans(null, true).' ago';
            */

            Session::put('last_online_time', $last_online_time);

            $logged_user->last_online_time        = now();
             
            $logged_user->save();

            return redirect()->route('admin.dashboard')->with('success_message', 'You have logged in successfully!');

        } else {
            return redirect()->route('admin-login')->with('error_message', 'Wrong Email Adrress or Password!');
        }
    }



    public function logout() {
        auth()->logout();
        return redirect()->route('admin-login')->with('success_message', 'You are now logged out!');

    }



    public function AdminDashboard() {

        $user = Auth::user(); 

        $main_role  =   $user->main_role;

            if($main_role   ==  "general_admin")
            {	
                $user_role						=			"General Administrator";
            }
            else
            {	
                $user_role						=			"Other Administrator";
            }

        return view('admin.index', ['user' => $user,'user_role' => $user_role]);

        
    }
    


        
        public function UpdatePasswordPage() {

            return view('admin.update-password'); 
            
        }


        public function UpdatePassword(Request $request)
        {

                // Retrieve the currently authenticated user
                $user = Auth::user();

                // Validate the new password input
                $request->validate([
                    'old_password' => 'required',
                    'new_password' => 'required|min:8',
                    'confirm_password' => 'required|same:new_password',
                ], [
                    'confirm_password.same' => 'The new password and Re-typed password must match.',
                ]);
            
                // Check if the old password matches the password stored in the database
                if (!Hash::check($request->old_password, $user->password)) {
                    return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
                }
            
                // Hash the new password
                $newPassword = Hash::make($request->input('new_password'));
            
                // Update the user's password
                $user->password = $newPassword;
                $user->save();
            
                // Redirect the user back with a success message
                return redirect()->route('admin.dashboard')->with('success_message', 'Password updated successfully!');
 

        }










}


