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
            'name'            => 'required|string|max:255',
            'email'           => 'nullable|email',
            'phone'           => 'nullable|string|max:20',
            'account_number'  => 'required|string|max:100',
        ]);

        Account::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'account_number' => $request->account_number,
        ]);

        return redirect()->back()->with('success', 'Account created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'nullable|email',
            'phone'           => 'nullable|string|max:20',
            'description'     => 'nullable|string',
            'balance'         => 'nullable|numeric',
            'account_number'  => 'required|string|max:100',
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
}
