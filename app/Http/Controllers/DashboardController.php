<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\User;

class DashboardController extends Controller
{



    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return $this->adminDashboard();
        } elseif ($user->isEmployer()) {
            return $this->employerDashboard();
        } elseif ($user->isUser()) {
            return $this->userDashboard();
        }

        abort(403);
    }



    public function employerDashboard()
    {
        // Get the logged in employer
        $user = auth()->user();


        if (!$user) {
            abort(403, 'Unauthorized: No user is logged in.');
        }

        // active and closed jobs for the employer
        $activeJobs = Job::where('user_id', $user->id)->where('status', 'active')->count();
        $closedJobs = Job::where('user_id', $user->id)->where('status', 'closed')->count();


        // pending applications
        $pendingApplications = Application::whereHas('job', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'pending')->get();

        //approved applications
        $approvedApplications = Application::with('job')
        ->whereHas('job', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->where('status', 'approved')->get();


        // rejected applications
        $rejectedApplications = Application::with('job')
        ->whereHas('job', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        }) ->where('status', 'rejected')->get();


        return view('employer.dashboard', compact('activeJobs', 'closedJobs', 'pendingApplications','approvedApplications','rejectedApplications','user'));
    }



    public function userDashboard()
    {
        // Get the logged-in user
        $user = auth()->user();

        // Get the applications for the user
        $applications = Application::where('user_id', $user->id)->get();

        return view('user.dashboard', compact('applications'));
    }



    public function adminDashboard()
{
    $totalUsers = User::count();
    $totalJobs = Job::count();
    $totalApplications = Application::count();
    $totalEmployers = User::where('role', 'employer')->count();
    $totalRegularUsers = User::where('role', 'user')->count();
    $pendingApplications = Application::where('status', 'pending')->count();
    $approvedApplications = Application::where('status', 'approved')->count();
    $rejectedApplications = Application::where('status', 'rejected')->count();

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalJobs',
        'totalEmployers',
        'totalRegularUsers',
        'totalApplications',
        'pendingApplications',
        'approvedApplications',
        'rejectedApplications'

    ));


}



}
