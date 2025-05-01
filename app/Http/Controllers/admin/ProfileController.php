<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    // Profile function
    public function profile()
    {
        $user = Auth::guard('admin')->user(); // Fetch the logged-in admin user

        // Return the view and pass the user data
        return view('backend.admin.profile', compact('user'));
    }

    // Profile update function
    public function updateProfile(Request $request)
    {
        $user = Auth::guard('admin')->user(); // Get the logged-in admin

        $user->name           = $request->name;
        $user->email          = $request->email;
        $user->about          = $request->about;

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = 'uploads/profile_pictures/';
            $destinationPath = public_path($path);
        
            if (!empty($user->profile_picture) && file_exists(public_path($user->profile_picture))) {
                unlink(public_path($user->profile_picture));
            }
        
            $image->move($destinationPath, $imageName);
            $user->profile_picture = $path . $imageName;
        }
        
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }

    // Update Password Function
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password'      => 'required',
            'new_password'          => 'required|min:6|confirmed', // Min length 6 and confirm password
        ]);

        $user = Auth::guard('admin')->user(); // Get the logged-in admin user

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }
        
        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Password updated successfully');
    }
}
