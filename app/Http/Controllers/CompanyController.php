<?php

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
            'code' => 'required|string|max:10',
            'companies' => 'required|string|max:255',
        ]);

        Companies::create([
            'code' => $request->code,
            'company' => $request->company,
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
