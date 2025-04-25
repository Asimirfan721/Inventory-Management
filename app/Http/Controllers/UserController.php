<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('access.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->role,
            'status' => $request->status ?? true,
        ]);

        return redirect()->route('access.user.store')->with('success', 'User created successfully!');
    }
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $data = $request->only(['name', 'email', 'phone', 'role', 'status']);

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect()->route('access.user.index')->with('success', 'User updated successfully!');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('access.user.index')->with('success', 'User deleted successfully!');
}

}
