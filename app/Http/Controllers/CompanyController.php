<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

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
            'Logo' => 'required|string',
            'Name' => 'required|string|max:255',
            'currency' => 'required|string|max:50',
        ]);

        $company = Company::create([
            'Logo' => $request->Logo,
            'Name' => $request->Name,
            'currency' => $request->currency,
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
            'Logo' => 'required|string',
            'Name' => 'required|string|max:255',
            'currency' => 'required|string|max:50',
        ]);

        $company = Company::findOrFail($id);
        $company->update([
            'Logo' => $request->Logo,
            'Name' => $request->Name,
            'currency' => $request->currency,
        ]);

        return redirect()->route('company.index')->with('success', 'Company updated successfully!');
    }
}
