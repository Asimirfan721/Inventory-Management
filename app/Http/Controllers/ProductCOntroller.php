<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products')); // adjust view path if needed
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'SKU' => 'required|string|max:255|unique:products,SKU',
        ]);

        Product::create([
            'product' => $request->product,
            'category' => $request->category,
            'brand' => $request->brand,
            'SKU' => $request->SKU,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    // Update existing product
    public function update(Request $request, $id)
    {
        $request->validate([
            'product' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'SKU' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'product' => $request->product,
            'category' => $request->category,
            'brand' => $request->brand,
            'SKU' => $request->SKU,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }
}
