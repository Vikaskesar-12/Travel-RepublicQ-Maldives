<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{
    // 🟢 1. Show all testimonials
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('backend.admin.testimonials.index', compact('testimonials'));
    }

    // 🟢 2. Show create form
    public function create()
    {
        return view('backend.admin.testimonials.create');
    }

    // 🟢 3. Store testimonial
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;
        $testimonial->rating = $request->rating;
        $testimonial->status = $request->status ?? 'inactive';

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimonials'), $filename);
            $testimonial->image = $filename;
        }

        $testimonial->save();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    // 🟢 4. Show edit form
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.admin.testimonials.edit', compact('testimonial'));
    }

    // 🟢 5. Update testimonial
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->message = $request->message;
        $testimonial->rating = $request->rating;
        $testimonial->status = $request->status ?? 'inactive';

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image
            if (File::exists(public_path('uploads/testimonials/' . $testimonial->image))) {
                File::delete(public_path('uploads/testimonials/' . $testimonial->image));
            }
            // Upload new image
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/testimonials'), $filename);
            $testimonial->image = $filename;
        }

        $testimonial->save();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    // 🟢 6. Delete testimonial
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete image
        if (File::exists(public_path('uploads/testimonials/' . $testimonial->image))) {
            File::delete(public_path('uploads/testimonials/' . $testimonial->image));
        }

        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }



    

    public function updateStatus(Request $request)
    {
        $testimonial = Testimonial::find($request->id);
        
        if ($testimonial) {
            $testimonial->status = $request->status;
            $testimonial->save();
    
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }
    
        return response()->json(['success' => false, 'message' => 'Testimonial not found']);
    }




}