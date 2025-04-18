<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $companies = Company::all();
        return view('customer.index', compact('companies','customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string', 
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'required',
            'company_id'  => 'required|exists:companies,id',
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string', 
            'email' => 'required|email',
            'phone' => 'nullable',
            'address' => 'required',
            'company_id'  => 'required|exists:companies,id',
        ]);  

        $customer = Customer::findOrFail($id);
        $companies = Company::all();
        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $companies = Company::all();
        return view('customer.edit', compact('customer', 'companies'));
    }
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
    public function create(){
        $companies = Company::all();
        return view('customer.create', compact('companies'));
    }


}
