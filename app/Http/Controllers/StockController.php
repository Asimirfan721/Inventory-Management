<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Stock; // model is restricted here
use App\Models\Supplier; // model is restricted

class StockController extends Controller
{
    // Display a listing of the stocks
    public function index()
    {
        $stocks = Stock::with('supplier')->get();
        $suppliers = Supplier::all(); // Fetch all suppliers for the dropdown
        return view('stocks.index', compact('stocks', 'suppliers')); // Pass suppliers to the view
    }
    
  

    // Store a newly created stock in storage
    public function store(Request $request)
    {
        $request->validate([
            'purchase_order' => 'required|string|max:255',
            'date'           => 'required|date',
            'no_of_days'     => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
            'total'          => 'required|numeric',
            
        ]);

        Stock::create([
            'purchase_order' => $request->purchase_order,
            'date'           => $request->date,
            'no_of_days'     => $request->no_of_days,
            'supplier_id'    => $request->supplier_id,
            'total'          => $request->total,
            
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry created successfully.');
    }

    // Update the specified stock in storage
    public function update(Request $request, $id)
    {
        $request->validate([ // validation rules
            'purchase_order' => 'required|string|max:255',
            'date'           => 'required|date',
            'no_of_days'     => 'required|integer',
            'supplier_id'    => 'required|exists:suppliers,id',
            'total'          => 'required|numeric',
            
        ]);

        $stock = Stock::findOrFail($id);

        $stock->update([
            'purchase_order' => $request->purchase_order,
            'date'           => $request->date,
            'no_of_days'     => $request->no_of_days,
            'supplier_id'    => $request->supplier_id,
            'total'          => $request->total,
            
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry updated successfully.');
    }

    // Remove the specified stock from storage
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id); // stock id
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock entry deleted successfully.');
    }
    public function create(){ $suppliers = Supplier::all(); // or apply filters if needed
        return view('stocks.create', compact('suppliers')); }
}
