<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(Request $request)
{
    $query = Expense::query();

    // Partial match on expense_id
    if ($request->filled('search')) {
        $search = trim($request->search);
        $query->whereRaw('CAST(expense_id AS CHAR) LIKE ?', ["%{$search}%"]);
    }

    // Filter by type if provided
    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    $expenses = $query->get();

    return view('expense.index', compact('expenses'));
}

    public function store(Request $request){
              $request->validate([
            'expense_id' => 'required|integer',
            'date' => 'required|date',
            'note' => 'required|string',
            'type' => 'required|string',
            'amount' => 'required|numeric',
            'account' => 'required|string',
            'remarks' => 'nullable|string'
        ]);
    
        Expense::create([
            'expense_id' => $request->expense_id,
            'date' => $request->date,
            'note' => $request->note,
            'type' => $request->type,
            'amount' => $request->amount,
            'account' => $request->account,
            'remarks' => $request->remarks,
        ]);
    
        return redirect()->route('expense.index')->with('success', 'Expense created successfully.'); // redirect to index
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'expense_id' => 'required|integer',
            'date' => 'required|date',
            'note' => 'required|string',
            'type' => 'required|string',
            'amount' => 'required|numeric',
            'account' => 'required|string',
            'remarks' => 'nullable|string'
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
