<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
   public function index(Request $request)
{
    $currencies = Currency::all();
    $query = Currency::query();
    if ($request->filled('search')) {
        $search = trim($request->search);
        $query->where(function($q) use ($search) {
            $q->where('currency', 'like', "%{$search}%") //search by currency name added
              ->orWhere('code', 'like', "%{$search}%");
        });
    }

    $currencies = $query->get();

    return view('currency.index', compact('currencies'));
}
public function create()
{
    return view('currency.create');
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

        return redirect()->route('currency.index')->with('success', 'Currency added successfully!'); // view issue resolved
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
