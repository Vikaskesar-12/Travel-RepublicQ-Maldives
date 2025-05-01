<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Tour;

class TravelManangementController extends Controller
{
    public function index()
    {
        $travels = Tour::latest()->get();
        return view('backend.admin.travel-manangement.index', compact('travels'));
    }

    public function create()
    {
        $countries = Country::all();
        // $categories = Category::all();
        $categories = Category::where('status', 'active')->get();

        return view('backend.admin.travel-manangement.create', compact('countries', 'categories'));
    }




    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category_id' => 'required|exists:categories,id',
                'subcategory_id' => 'required|exists:subcategories,id',
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'city_id' => 'required|exists:cities,id',
                'duration' => 'nullable|string|max:100',
                'price' => 'nullable|numeric',
                'departure_date' => 'nullable|date',
                'return_date' => 'nullable|date|after_or_equal:departure_date',
                'tour_type' => 'nullable|in:honeymoon,adventure,family,wildlife,beach,luxury',
                'accommodation_type' => 'nullable|in:hotel,resort,hostel,apartment,camping,villa',
                'transport_included' => 'nullable|in:yes,no',
                'meals_included' => 'nullable|in:yes,no',
                'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'gallery_images' => 'nullable|array',
                'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'seo_keywords' => 'nullable|string',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'status' => 'nullable|boolean',
            ]);
            // dd($request->all());

    
            // **Data Store**
            $tour = new Tour();
            $tour->name = $request->name;
            $tour->description = $request->description;
            $tour->category_id = $request->category_id;
            $tour->subcategory_id = $request->subcategory_id;
            $tour->country_id = $request->country_id;
            $tour->state_id = $request->state_id;
            $tour->city_id = $request->city_id;
            $tour->duration = $request->duration;
            $tour->price = $request->price;
            $tour->departure_date = $request->departure_date;
            $tour->return_date = $request->return_date;
            $tour->tour_type = $request->tour_type;
            $tour->accommodation_type = $request->accommodation_type;
            $tour->transport_included = $request->transport_included;
            $tour->meals_included = $request->meals_included;
            $tour->seo_keywords = $request->seo_keywords;
            $tour->meta_title = $request->meta_title;
            $tour->meta_description = $request->meta_description;
            $tour->status = $request->status ?? 1; // Default active
    
            // **Featured Image Upload**
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = 'uploads/tours/' . $filename;
                $file->move(public_path('uploads/tours'), $filename);
                $tour->featured_image = $filePath;
            }
    
            // **Gallery Images Upload**
            $galleryImagePaths = [];
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $filePath = 'uploads/tours/gallery/' . $filename;
                    $image->move(public_path('uploads/tours/gallery'), $filename);
                    $galleryImagePaths[] = $filePath;
                }
            }
            $tour->gallery_images = json_encode($galleryImagePaths); // Store JSON format
    // dd($tour);
            $tour->save();
    
            return redirect()->route('admin.travel.index')->with('success', 'Tour added successfully.');
        
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Database Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    






    public function edit($id)
    {
        $travel = Tour::findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        $categories = Category::where('status', 'active')->get();
        $subcategories = SubCategory::where('status', 'active')->orderBy('name')->get();
        
        return view('backend.admin.travel-manangement.edit', compact('travel', 'countries', 'categories','subcategories','states','cities'));
    }





    public function update(Request $request, $id)
{
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'duration' => 'nullable|string|max:100',
            'price' => 'nullable|numeric',
            'departure_date' => 'nullable|date',
            'return_date' => 'nullable|date|after_or_equal:departure_date',
            'tour_type' => 'nullable|in:honeymoon,adventure,family,wildlife,beach,luxury',
            'accommodation_type' => 'nullable|in:hotel,resort,hostel,apartment,camping,villa',
            'transport_included' => 'nullable|in:yes,no',
            'meals_included' => 'nullable|in:yes,no',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'seo_keywords' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $tour = Tour::findOrFail($id);

        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->category_id = $request->category_id;
        $tour->subcategory_id = $request->subcategory_id;
        $tour->country_id = $request->country_id;
        $tour->state_id = $request->state_id;
        $tour->city_id = $request->city_id;
        $tour->duration = $request->duration;
        $tour->price = $request->price;
        $tour->departure_date = $request->departure_date;
        $tour->return_date = $request->return_date;
        $tour->tour_type = $request->tour_type;
        $tour->accommodation_type = $request->accommodation_type;
        $tour->transport_included = $request->transport_included;
        $tour->meals_included = $request->meals_included;
        $tour->seo_keywords = $request->seo_keywords;
        $tour->meta_title = $request->meta_title;
        $tour->meta_description = $request->meta_description;
        
        $tour->status = $request->status ?? 1;

        // **Update Featured Image**
        if ($request->hasFile('featured_image')) {
            if ($tour->featured_image && file_exists(public_path($tour->featured_image))) {
                unlink(public_path($tour->featured_image));
            }
            $file = $request->file('featured_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/tours/' . $filename;
            $file->move(public_path('uploads/tours'), $filename);
            $tour->featured_image = $filePath;
        }

        // **Update Gallery Images**
        $galleryImagePaths = json_decode($tour->gallery_images, true) ?? [];

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $filePath = 'uploads/tours/gallery/' . $filename;
                $image->move(public_path('uploads/tours/gallery'), $filename);
                $galleryImagePaths[] = $filePath;
            }
        }

        $tour->gallery_images = json_encode($galleryImagePaths);

        $tour->save();

        return redirect()->route('admin.travel.index')->with('success', 'Tour updated successfully.');

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}











    public function deleteGalleryImage(Request $request)
{
    try {
        $image = $request->image;
        $tour = Tour::whereJsonContains('gallery_images', $image)->first();

        if ($tour) {
            $galleryImages = json_decode($tour->gallery_images, true);
            $galleryImages = array_filter($galleryImages, function ($img) use ($image) {
                return $img !== $image;
            });

            $tour->gallery_images = json_encode(array_values($galleryImages));
            $tour->save();

            if (file_exists(public_path($image))) {
                unlink(public_path($image));
            }

            return response()->json(['success' => true]);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}

    





    public function destroy($id)
    {
        Tour::findOrFail($id)->delete();
                return redirect()->route('admin.travel.index')->with('success', 'Tour updated successfully.');
    }





    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }

    public function updateStatus(Request $request)
    {
        $travel = Tour::findOrFail($request->id);
        $travel->status = $request->status; // 'Active'  'Inactive' 
        $travel->save();
    
        return response()->json(['success' => 'Status updated successfully.']);
    }
    
}
