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
        'Company' => 'required|string|max:255',
        'Currency' => 'required|string|max:50',
    ]);

    Company::create([
        'Logo' => $request->Logo,
        'Company' => $request->Company,  // ✅ Correct field name
        'Currency' => $request->currency,
    ]);


        return redirect()->route('company.index')->with('success', 'Company added successfully!');
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'code' => 'required|string|max:10',
        'company' => 'required|string|max:255',
    ]);

    $company = Company::findOrFail($id);
    $company->update([
        'code' => $request->code,
        'company' => $request->company,
    ]);

    return redirect()->route('company.index')->with('success', 'Company updated successfully!');
}

}
