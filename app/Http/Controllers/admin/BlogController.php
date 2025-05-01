<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Show All Blogs
    public function index()
    {
        $blogs = Blog::with('category')->orderBy('id', 'DESC')->get();
        return view('backend.admin.blogs.index', compact('blogs'));
    }

    // Show Create Form
    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('backend.admin.blogs.create', compact('categories'));
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'author_name' => 'nullable|string',

                'publish_date' => 'nullable|date',
                'status' => 'required|in:active,inactive',
            ]);
    
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category_id;
            $blog->description = $request->description;
            $blog->author_name = $request->author_name;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keywords = $request->meta_keywords;
            $blog->publish_date = $request->publish_date;
            $blog->status = $request->status;
    
           // Featured Image Upload
             if ($request->hasFile('featured_image')) {
             $file = $request->file('featured_image');
             $filename = time() . '_' . $file->getClientOriginalName();
             $filePath = 'uploads/blogs/' . $filename;
              $file->move(public_path('uploads/blogs'), $filename);
                $blog->featured_image = $filePath;
             }

             // Gallery Images Upload
             if ($request->hasFile('gallery_images')) {
             $galleryImages = [];
             foreach ($request->file('gallery_images') as $image) {
              $filename = time() . '_' . $image->getClientOriginalName();
             $path = 'uploads/blogs/gallery/' . $filename;
             $image->move(public_path('uploads/blogs/gallery'), $filename);
                $galleryImages[] = $path;
             }
            $blog->gallery_images = json_encode($galleryImages);
                }

            // dd($blog);
    
            $blog->save();
    
            return redirect()->route('blogs.index')->with('success', 'Blog added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    




    // Show Edit Form
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::where('status', 'active')->get();
        return view('backend.admin.blogs.edit', compact('blog', 'categories'));
    }







    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'description' => 'required',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'author_name' => 'nullable|string',
                'publish_date' => 'nullable|date',
                'status' => 'required|in:active,inactive',
            ]);
    
            $blog = Blog::findOrFail($id);
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category_id;
            $blog->description = $request->description;
            $blog->author_name = $request->author_name;
            $blog->meta_title = $request->meta_title;
            $blog->meta_description = $request->meta_description;
            $blog->meta_keywords = $request->meta_keywords;
            $blog->publish_date = $request->publish_date;
            $blog->status = $request->status;
    
            // **Featured Image Update**
            if ($request->hasFile('featured_image')) {
                // Delete Old Image if Exists
                if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                    unlink(public_path($blog->featured_image));
                }
    
                $file = $request->file('featured_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/blogs/' . $filename;
                $file->move(public_path('uploads/blogs'), $filename);
                $blog->featured_image = $filePath;
            }
    
            // **Gallery Images Update**
            if ($request->hasFile('gallery_images')) {
                // Delete Old Gallery Images
                if ($blog->gallery_images) {
                    $oldGalleryImages = json_decode($blog->gallery_images, true);
                    foreach ($oldGalleryImages as $oldImage) {
                        if (file_exists(public_path($oldImage))) {
                            unlink(public_path($oldImage));
                        }
                    }
                }
    
                $galleryImages = [];
                foreach ($request->file('gallery_images') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $path = 'uploads/blogs/gallery/' . $filename;
                    $image->move(public_path('uploads/blogs/gallery'), $filename);
                    $galleryImages[] = $path;
                }
                $blog->gallery_images = json_encode($galleryImages);
            }
    


            // dd($blog);
            $blog->save();
    
            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    




    // Delete Blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(['success' => 'Blog deleted successfully!']);
    }

    // AJAX Update Status
    public function updateStatus(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->status = $request->status;
        $blog->save();
        return response()->json(['success' => 'Status updated successfully!']);
    }
}
