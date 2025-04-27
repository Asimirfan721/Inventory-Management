<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();    // Fetch all categories from the database
        return view('product.category', compact('categories')); // Pass the categories to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);     // Find the category by ID
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found!');
        }
        $category->update($request->all());

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
