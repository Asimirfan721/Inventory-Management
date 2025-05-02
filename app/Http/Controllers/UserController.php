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
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:15',
        'role' => 'required|in:admin,user',
        'status' => 'required|boolean',
        'password' => 'required|string|min:8',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'role' => $request->role,
        'status' => $request->status,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('access.user.index')->with('success', 'User created successfully.');
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
