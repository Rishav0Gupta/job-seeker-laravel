<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('admin.dashboard');
    }

    public function allUsers()
{
    $users = User::all(); 
    return view('admin.all-users', compact('users'));
}


    public function employerIndex()
{
    $employers = User::where('role', 'employer')->get();
    return view('admin.employers.index', compact('employers'));
}

public function editEmployer(User $user)
{
    if ($user->role !== 'employer') {
        abort(403, 'Unauthorized');
    }
    return view('admin.employers.edit', compact('user'));
}

public function updateEmployer(Request $request, User $user)
{
    if ($user->role !== 'employer') {
        abort(403, 'Unauthorized');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        // Add other fields as needed
    ]);

    $user->update($request->all());

    return redirect()->route('admin.employers.index')->with('success', 'Employer updated successfully.');
}

public function destroyEmployer(User $user)
{
    if ($user->role !== 'employer') {
        abort(403, 'Unauthorized');
    }

    $user->delete();

    return redirect()->route('admin.employers.index')->with('success', 'Employer deleted successfully.');
}

// Regular Users
public function userIndex()
{
    $users = User::where('role', 'user')->get();
    return view('admin.users.index', compact('users'));
}


public function editUser(User $user)
{
    if ($user->role !== 'user') {
        abort(403, 'Unauthorized');
    }

    return view('admin.users.edit', compact('user'));
}

public function updateUser(Request $request, User $user)
{
    if ($user->role !== 'user') {
        abort(403, 'Unauthorized');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        // Add other fields if needed
    ]);

    $user->update($request->all());

    return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
}

public function destroyUser(User $user)
{
    if ($user->role !== 'user') {
        abort(403, 'Unauthorized');
    }

    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}

public function showEmployer($id) {
    $employer = User::where('role', 'employer')->findOrFail($id);
    return view('admin.employers.show', compact('employer'));
}

public function showUser($id) {
    $user = User::where('role', 'user')->findOrFail($id);
    return view('admin.users.show', compact('user'));
}


public function storeUser(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);
}

}
