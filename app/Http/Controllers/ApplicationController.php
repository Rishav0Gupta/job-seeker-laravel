<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application; // Add this import statement


class ApplicationController extends Controller
{
    public function showLoginForm()
{
    return view('admin.auth.login');
}


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function index()
    {
        // Fetch all applications (or add any filters as needed)
        $applications = Application::all();

        // Pass applications to the view
        return view('application.index', compact('applications'));
    }

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login'); // Redirect back to login page
}


}
