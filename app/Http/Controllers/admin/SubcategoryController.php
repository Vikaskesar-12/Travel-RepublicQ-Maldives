<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('backend.admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('backend.admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        Subcategory::create([
            'name' => $request->name,
            'slug' => \Illuminate\Support\Str::slug($request->name),
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.subcategories')->with('success', 'Subcategory added successfully!');
    }




    public function edit($id)
{
    $subcategory = Subcategory::findOrFail($id);
    $categories = Category::where('status', 'active')->get();
    return view('backend.admin.subcategory.edit', compact('subcategory', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|unique:subcategories,name,' . $id,
        'category_id' => 'required|exists:categories,id',
        'status' => 'required',
    ]);

    $subcategory = Subcategory::findOrFail($id);
    $subcategory->update([
        'name' => $request->name,
        'slug' => \Illuminate\Support\Str::slug($request->name),
        'category_id' => $request->category_id,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.subcategories')->with('success', 'Subcategory updated successfully!');
}



    

    public function destroy($id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->route('admin.subcategories')->with('success', 'Subcategory deleted successfully!');
    }

    public function getSubcategories(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->where('status', 'active')->get();
        return response()->json($subcategories);
    }


    public function toggleStatus(Request $request)
{
    $subcategory = Subcategory::findOrFail($request->id);
    $subcategory->status = $request->status;
    $subcategory->save();

    return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
}

}
