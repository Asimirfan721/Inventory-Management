<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('product.brand', compact('brands')); // compact('brands') passes the brands data to the view
    }
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

    return redirect()->route('product.brand')->with('success', 'Brand added successfully!');
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'required|string|max:255',
    ]);

    $brand = Brand::find($id);  // find the brand by ID 
    $brand->update([ // update the brand with new data
        'title' => $request->title,
        'summary' => $request->summary,
    ]);

    return redirect()->route('product.brand')->with('success', 'Brand updated successfully!');
}

public function destroy($id)
{
    Brand::find($id)->delete();
    return redirect()->route('product.brand')->with('success', 'Brand deleted successfully!');
}
public function create()
{
    $brands = Brand::all();  //brand names are fetched from the database
    $currencies = Currency::all(); // currencies are fetched from the database
    $companies = Company::all();   // companies are fetched from the database

    return view('product.create', compact('brands', 'currencies', 'companies'));
}
}
