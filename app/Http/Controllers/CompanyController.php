<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Currency;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|string',
            'name' => 'required|string|max:255',
            'currency' => 'required|string|max:50',
            'currency_id' => 'required|exists:currencies,id',
        ]);

        $company = Company::create([
            'logo' => $request->logo,
            'name' => $request->name,
            'currency' => $request->currency,
            'currency_id' => $request->currency_id,
        ]);

        // For AJAX response
        if ($request->ajax()) {
            return response()->json(['success' => true, 'company' => $company]);
        }

        return redirect()->route('company.index')->with('success', 'Company added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'required|string',
            'name' => 'required|string|max:255',
            'currency' => 'required|string|max:50',
        ]);

        $company = Company::findOrFail($id);
        $company->update([
            'logo' => $request->logo,
            'name' => $request->name,
            'currency' => $request->currency,
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
