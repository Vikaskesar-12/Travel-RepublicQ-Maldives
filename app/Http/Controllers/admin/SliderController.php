<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller {
    public function edit() {
        $slider = Slider::where('type', 'slider')->first();
        return view('backend.admin.vedio-banner.index', compact('slider'));
    }

    public function update(Request $request) {
        $request->validate([
            'heading' => 'required|string|max:255',
            'video' => 'nullable|mimes:mp4,avi,mov|max:40960', // 40MB limit
            'type' => 'nullable|string|max:255',
        ]);
    
        $slider = Slider::where('type', 'slider')->first();
    
        if (!$slider) {
            return redirect()->back()->with('error', 'Slider not found!');
        }
    
        // Check if file size exceeds limit
        if ($request->hasFile('video')) {
            if ($request->file('video')->getSize() > 41943040) { // 40MB in bytes
                return redirect()->back()->with('error', 'Your video is too large. Please upload a video of up to 40MB.');
            }
    
            // Define video storage path
            $filename = time() . '_' . $request->file('video')->getClientOriginalName();
            $filePath = 'uploads/sliders/' . $filename;
            
            // Move video to the 'uploads/sliders/' folder
            $request->file('video')->move(public_path('uploads/sliders'), $filename);
    
            // Update the slider with the new video path
            $slider->update(['video' => $filePath]);
        }
    
        $slider->update([
            'type' => $request->type ?? 'slider',
            'heading' => $request->heading,
        ]);
    
        return redirect()->route('admin.sliders.edit')->with('success', 'Slider Updated Successfully!');
    }
    
    
    
}
