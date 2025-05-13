<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
class ProductController extends Controller
{
    // Show all products view
    public function index()
    {
        $products = Product::all();
        $products = Product::with('brand')->get(); // 👈 Eager load brand relationship has been added
        $brands = Brand::all(); // 👈 Fetch all brands in the view
        $categories = Category::all(); // ⬅️ Add this line 

        return view('product.index', compact('products', 'brands', 'categories')); // adjust view path if needed
    }

    // Store a new product
    public function store(Request $request)
    {

        $request->validate([
            'product' => 'required|string|max:255', 
            'category' => 'required|string|max:255',
             'brand' => 'required|exists:brands,id', // brand should be an integer
            'SKU' => 'required|string|max:255|unique:products,SKU', // sku
        ]);

        Product::create([
            'product' => $request->product,
            'category' => $request->category,
            'brand' => $request->brand, // 👈 assuming your column is named brand
            // 'brand' => $request->brand, // if you want to store brand name instead of id
            'SKU' => $request->SKU,
        ]);
        //return redirect()->route('product.index')->with('success', 'Product added successfully!');
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    // Update existing product
    public function update(Request $request, $id)
{
    $request->validate([
        'product' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'brand' => 'required|exists:brands,id',
        'SKU' => 'required|string|max:255|unique:products,SKU,' . $id, // avoid unique conflict on current product
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'product' => $request->product,
        'category' => $request->category,
        'brand' => $request->brand,
        'SKU' => $request->SKU, // sku is a number
    ]);

    return redirect()->back()->with('success', 'Product updated successfully!');
}

    public function destroy($id)
{
    // Find the currency by its ID
    $product = Product::findOrFail($id);

    // Delete the currency
    $product->delete();

    // Redirect back with success message
    return redirect()->back()->with('success', 'product deleted successfully.');
}
public function create()
{
    $brands = Brand::all();
    $categories = Category::all(); // ⬅category called in function

   
    return view('product.create', compact('brands', 'categories' ));
}
}
