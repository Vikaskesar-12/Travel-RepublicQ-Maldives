<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // 1. List All Categories
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.admin.categories.index', compact('categories'));
    }
    // 2. Show Create Form
    public function create()
    {
        return view('backend.admin.categories.create');
    }

    // 3. Store New Category
    public function store(Request $request)
    {
        $request->validate([
            'name'               => 'required|unique:categories,name',
        ]);

        Category::create([
            'name'               => $request->name,
            'slug'               => Str::slug($request->name),
            'status'             => $request->status ?? 'active',
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }

    // 4. Show Edit Form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.admin.categories.edit', compact('category'));
    }

    // 5. Update Category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);
        $category->update([
            'name'               => $request->name,
            'slug'               => Str::slug($request->name),
            'status'             => $request->status,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }

    // 6. Delete Category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }



    public function updateStatus(Request $request)
    {
        $category = Category::find($request->id);

        if ($category) {
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Category not found'], 404);
    }
}
