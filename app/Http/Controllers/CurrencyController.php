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
    public function update(Request $request, $id)
{
    $request->validate([
        'code' => 'required|string|max:10',
        'currency' => 'required|string|max:255',
    ]);

    $currency = Currency::findOrFail($id);
    $currency->update([
        'code' => $request->code,
        'currency' => $request->currency,
    ]);

    return redirect()->route('currency.index')->with('success', 'Currency updated successfully!');
}
public function destroy($id)
{
    // Find the currency by its ID
    $currency = Currency::findOrFail($id);

    // Delete the currency
    $currency->delete();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Currency deleted successfully.');
}

}
