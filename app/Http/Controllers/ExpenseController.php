<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(){
        $expenses = Expense::all();
        return view('expense.index', compact('expenses'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        Expense::create($request->all());

        return redirect()->route('expense.index')->with('success', 'Expense created successfully.');
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'nullable|string'
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expense.index')->with('success', 'Expense updated successfully.');
    }
    public function destroy($id){
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expense.index')->with('success', 'Expense deleted successfully.');
    }
}
