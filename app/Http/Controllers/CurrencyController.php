<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return view('currency.index', compact('currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10',
            'currency' => 'required|string|max:255',
        ]);

        Currency::create([
            'code' => $request->code,
            'currency' => $request->currency,
        ]);

        return redirect()->route('currency.index')->with('success', 'Currency added successfully!');
    }
}
