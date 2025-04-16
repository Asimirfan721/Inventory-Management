<?php
// app/Http/Controllers/AccountController.php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('account.index', compact('accounts'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name'           => 'required|string|max:255',
        'phone'          => 'nullable|string|max:20',
        'account_number' => 'required|string|max:100',
        'description'    => 'nullable|string|max:500',
        'balance'        => 'nullable|numeric|min:0',
    ]);

    Account::create([ 
        'name'           => $request->name,
        'phone'          => $request->phone,
        'account_number' => $request->account_number,
        'description'    => $request->description,
        'balance'        => $request->balance ?? 0,
       
    ]);

    return redirect()->back()->with('success', 'Account created successfully.');
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
             'phone'           => 'nullable|string|max:20',
             'account_number'  => 'required|string|max:100',
            'description'     => 'nullable|string',
            'balance'         => 'nullable|numeric',
            
        ]);

        $account = Account::findOrFail($id);
        $account->update($request->all());

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->back()->with('success', 'Account deleted successfully.');
    }
    public function create(){
        return view('account.create');
    }
}
