<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'required|string|max:255',
    ]);

    Brand::create([
        'title' => $request->title,
        'summary' => $request->summary,
    ]);

    return redirect()->route('brand.index')->with('success', 'Brand added successfully!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'required|string|max:255',
    ]);

    $brand = Brand::find($id);
    $brand->update([
        'title' => $request->title,
        'summary' => $request->summary,
    ]);

    return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
}

public function destroy($id)
{
    Brand::find($id)->delete();
    return redirect()->route('brand.index')->with('success', 'Brand deleted successfully!');
}

}
