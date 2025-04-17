<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Company;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('company')->get();
        $companies = Company::all(); // <-- add this
        
        return view('supplier.index', compact('suppliers', 'companies'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('supplier.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string',
            'email'       => 'required|email',
            'phone'       => 'required',
            'address'     => 'required',
            'company_id'  => 'required|exists:companies,id', // Validate company
        ]);

        Supplier::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Supplier created successfully.');
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        $companies = Company::all();
        return view('supplier.edit', compact('supplier', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string',
            'email'       => 'required|email',
            'phone'       => 'required',
            'address'     => 'required',
            'company_id'  => 'required|exists:companies,id',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully.');
    }
}
