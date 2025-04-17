<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Handle the login attempt
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Get the credentials from the request
        $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle logout functionality
    public function logout(Request $request)
    {
        // Log the admin out
        Auth::guard('admin')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        // Fetch the total number of users
        $totalUsers = User::count(); // Or adjust based on your model

        // Fetch the total number of jobs
        $totalJobs = Job::count(); // Or adjust based on your model

        // Pass the data to the view
        return view('admin.dashboard', compact('totalUsers', 'totalJobs'));
    }

    public function index()
{
    $totalUsers = User::count();
    $totalJobs = Job::count();

    return view('admin.dashboard', compact('totalUsers', 'totalJobs'));
}

}
