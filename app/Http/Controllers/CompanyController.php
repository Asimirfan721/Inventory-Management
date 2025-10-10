<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Currency; 
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('currency')->get(); // eager  
        $currencies = Currency::all();   // Not loading currency, it's not 
        return view('company.index', compact('companies', 'currencies'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'currency_id' => 'required|exists:currencies,id',
        'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $logoPath = $request->file('logo')->store('logos', 'public');

    Company::create([
        'name' => $request->name,
        'currency_id' => $request->currency_id,
        'logo' => $logoPath,
    ]);

    return redirect()->route('company.index')->with('success', 'Company created successfully!');
}

public function update(Request $request, Company $company)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'currency_id' => 'required|exists:currencies,id',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('logo')) {
        // delete old logo if exists
        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }

        $logoPath = $request->file('logo')->store('logos', 'public');
        $company->logo = $logoPath;
    }

    $company->update([
        'name' => $request->name,
        'currency_id' => $request->currency_id,
        'logo' => $company->logo,
    ]);

    return redirect()->route('company.index')->with('success', 'Company updated successfully!');
}

    public function destroy($id)
{
    // Find the currency by its ID
    $company = Company::findOrFail($id);

    // Delete the currency
    $company->delete();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Company deleted successfully.');
}
public function create()
{
    $currencies = Currency::all(); // fetch all currencies from DB
    return view('company.create', compact('currencies'));
}
}
