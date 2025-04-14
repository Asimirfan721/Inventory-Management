<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();
        return view('stocks.index', compact('stocks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'purchase_order' => 'required|string|max:255',
            'date'           => 'required|date',
            'no_of_days'     => 'required|integer',
            'supplier'       => 'required|string|max:255',
            'total'          => 'required|numeric',
        ]);

        Stock::create($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock entry created successfully.');
    }

    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'purchase_order' => 'required|string|max:255',
            'date'           => 'required|date',
            'no_of_days'     => 'required|integer',
            'supplier'       => 'required|string|max:255',
            'total'          => 'required|numeric',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')->with('success', 'Stock entry updated successfully.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')->with('success', 'Stock entry deleted successfully.');
    }
}
