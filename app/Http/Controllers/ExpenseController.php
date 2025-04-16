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
            'Expense_ID' => 'required|integer',
            'date' => 'required|date',
            'Note' => 'required|string',
            'Type' => 'required|string',
            'Amount' => 'required|numeric',
            'Account' => 'required|string',
            'Remarks' => 'nullable|string'
        ]);
    
        Expense::create([
            'expense_id' => $request->Expense_ID,
            'date' => $request->date,
            'note' => $request->Note,
            'type' => $request->Type,
            'amount' => $request->Amount,
            'account' => $request->Account,
            'remarks' => $request->Remarks,
        ]);
    
        return redirect()->route('expense.index')->with('success', 'Expense created successfully.');
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'Expense_ID' => 'required|integer',
            'date' => 'required|date',
            'Note' => 'required|string',
            'Type' => 'required|string',
            'Amount' => 'required|numeric',
            'Account' => 'required|string',
            'Remarks' => 'nullable|string'
        ]);
    
        $expense = Expense::findOrFail($id);
        $expense->update([
            'expense_id' => $request->Expense_ID,
            'date' => $request->date,
            'note' => $request->Note,
            'type' => $request->Type,
            'amount' => $request->Amount,
            'account' => $request->Account,
            'remarks' => $request->Remarks,
        ]);
    
        return redirect()->route('expense.index')->with('success', 'Expense updated successfully.');
    }
        public function destroy($id){
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expense.index')->with('success', 'Expense deleted successfully.');
    }
    public function create(){
        return view('expense.create');
    }
}
