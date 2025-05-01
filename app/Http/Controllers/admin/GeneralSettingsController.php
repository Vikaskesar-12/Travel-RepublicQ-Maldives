<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GeneralSettingsController extends Controller
{
    // Method to show the settings page
    public function settings()
    {
        // Retrieve general settings from the database
        $settings = GeneralSettings::first(); // Assuming only one record exists
        $user = Auth::guard('admin')->user();

        return view('backend.admin.general_settings', compact('settings','user'));
    }

    public function updateGeneralSettings(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'site_name'                  => 'nullable|string|max:255',
            'site_description'           => 'nullable|string',
            'site_keywords'              => 'nullable|string',
            'contact_email'              => 'nullable|email',
            'phone_number'               => 'nullable|string',
            'facebook_link'              => 'nullable|url',
            'twitter_link'               => 'nullable|url',
            'instagram_link'             => 'nullable|url',
            'linkedin_link'              => 'nullable|url',
            'meta_title'                 => 'nullable|string|max:255',
            'meta_description'           => 'nullable|string|max:255',
            'meta_keywords'              => 'nullable|string',
            'header_logo'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_logo'                => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_address'            => 'nullable|string',
        ]);
    
        try {
            // Retrieve the existing settings record
            $settings = GeneralSettings::findOrFail($id);
    
            // Handle Header Logo Upload
            if ($request->hasFile('header_logo')) {
                $image = $request->file('header_logo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/header_images/';
                $destinationPath = public_path($path);
    
                // Delete old header logo if exists
                if (!empty($settings->header_logo) && file_exists(public_path($settings->header_logo))) {
                    unlink(public_path($settings->header_logo));
                }
    
                $image->move($destinationPath, $imageName);
                $settings->header_logo = $path . $imageName;
            }
    
            // Handle Footer Logo Upload
            if ($request->hasFile('footer_logo')) {
                $image = $request->file('footer_logo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/footer_images/';
                $destinationPath = public_path($path);
    
                // Delete old footer logo if exists
                if (!empty($settings->footer_logo) && file_exists(public_path($settings->footer_logo))) {
                    unlink(public_path($settings->footer_logo));
                }
    
                $image->move($destinationPath, $imageName);
                $settings->footer_logo = $path . $imageName;
            }
    
            // Update the general settings in the database
            $settings->update([
                'site_name'                         => $request->input('site_name', $settings->site_name),
                'site_description'                  => $request->input('site_description', $settings->site_description),
                'site_keywords'                     => $request->input('site_keywords', $settings->site_keywords),
                'contact_email'                     => $request->input('contact_email', $settings->contact_email),
                'phone_number'                      => $request->input('phone_number', $settings->phone_number),
                'facebook_link'                     => $request->input('facebook_link', $settings->facebook_link),
                'twitter_link'                      => $request->input('twitter_link', $settings->twitter_link),
                'instagram_link'                    => $request->input('instagram_link', $settings->instagram_link),
                'linkedin_link'                     => $request->input('linkedin_link', $settings->linkedin_link),
                'meta_title'                        => $request->input('meta_title', $settings->meta_title),
                'meta_description'                  => $request->input('meta_description', $settings->meta_description),
                'meta_keywords'                     => $request->input('meta_keywords', $settings->meta_keywords),
                'contact_address'                   => $request->input('contact_address', $settings->contact_address),
            ]);
    
            return redirect()->route('admin.settings')->with('success', 'Settings updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Error updating general settings: ' . $e->getMessage());
            return back()->with('error', 'There was an issue updating the settings. Please try again.');
        }
    }
    
}
