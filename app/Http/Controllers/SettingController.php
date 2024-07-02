<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


        public function Index()
        {
            return view('admin.settings.index'); 
        }

    

        public function GeneralSettingsPage()
        {

            $generalsettings   =   Setting::first();
 
            return view('admin.settings.general-settings', compact('generalsettings'));

        }

    
 
 
 
        public function GeneralSettings(Request $request)
        {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'default_check_in_hours' => 'required',
                'default_check_out_hours' => 'required',
                'company_email_address' => 'required|email',
                'company_email_address_2' => 'nullable|email',
                'company_phone_number' => 'required',
                'company_phone_number_2' => 'nullable',
                'company_address' => 'required',
            ]);
    
            // Get the first row from the settings table
            $generalsettings = Setting::first();
    
            // Update the setting with validated data
            $generalsettings->update($validatedData);
    
            // Redirect back with success message
            return redirect()->back()->with('success_message', 'Settings updated successfully.');
        }

 

  
}