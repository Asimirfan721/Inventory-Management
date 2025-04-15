<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    // Display a listing of the stocks
    public function index()
    {
        $stocks = Stock::with('supplier')->get();
        $suppliers = Supplier::all();
        return view('stocks.index', compact('stocks', 'suppliers'));
    }
    

    // Store a newly created stock in storage
    public function store(Request $request)
    {
        $request->validate([
            'purchase_order' => 'required|string|max:255',
            'date'           => 'required|date',
            'no_of_days'     => 'required|integer',
            'supplier'       => 'required|string|max:255',
            'total'          => 'required|numeric',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Stock::create([
            'purchase_order' => $request->purchase_order,
            'date'           => $request->date,
            'no_of_days'     => $request->no_of_days,
            'supplier'       => $request->supplier,
            'total'          => $request->total,
            'supplier_id'    => $request->supplier_id,
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry created successfully.');
    }

    // Update the specified stock in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'purchase_order' => 'required|string|max:255',
            'date'           => 'required|date',
            'no_of_days'     => 'required|integer',
            'supplier'       => 'required|string|max:255',
            'total'          => 'required|numeric',
            'supplier_id'    => 'required|exists:suppliers,id',
        ]);

        $stock = Stock::findOrFail($id);

        $stock->update([
            'purchase_order' => $request->purchase_order,
            'date'           => $request->date,
            'no_of_days'     => $request->no_of_days,
            'supplier'       => $request->supplier,
            'total'          => $request->total,
            'supplier_id'    => $request->supplier_id,
        ]);

        return redirect()->route('stocks.index')->with('success', 'Stock entry updated successfully.');
    }

    // Remove the specified stock from storage
    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock entry deleted successfully.');
    }
}
