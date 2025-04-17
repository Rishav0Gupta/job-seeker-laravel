<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/admin/fake-login', function () {
    Auth::guard('admin')->login(Admin::first());
    return redirect('/admin/dashboard');
});

// In routes/web.php
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
// routes/web.php
Route::get('/admin/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');


// Show the login form
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

// Handle the login
Route::post('admin/login', [AuthController::class, 'login']);

// Admin logout
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::prefix('admin')->name('admin.')->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Protected routes
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', function () {
            $jobs = \App\Models\Job::count();
            $applications = \App\Models\Application::count();
            return view('admin.dashboard.index', compact('jobs', 'applications'));
        })->name('dashboard');

        // Reusing JobController
        Route::resource('jobs', JobController::class)->names('jobs');

        // Reusing ApplicationController
        Route::resource('applications', ApplicationController::class)->names('applications');

        // Logout
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});



Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
        // Future routes for managing jobs and applications
    });
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Dashboard

Route::get('dashboard', function () {
    $jobs = \App\Models\Job::count();
    $applications = \App\Models\Application::count();
    return view('admin.dashboard.index', compact('jobs', 'applications'));
})->middleware('admin.auth')->name('dashboard');


Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('welcome');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Authentication Routes (Registration, Login, Logout, Password Reset)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Forgot Password & Reset Routes
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

// Confirm Password Route
Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

// Profile Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // View profile (read-only)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Update profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Delete account
});

// Admin Manage regular users
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'userIndex'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::get('/admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.users.show');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
});

// Admin Manage Employer Users
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/employers', [AdminController::class, 'employerIndex'])->name('admin.employer.index');
    Route::get('/admin/employers/{user}/edit', [AdminController::class, 'editEmployer'])->name('admin.employer.edit');
    Route::put('/admin/employers/{user}', [AdminController::class, 'updateEmployer'])->name('admin.employer.update');
    Route::delete('/admin/employers/{user}', [AdminController::class, 'destroyEmployer'])->name('admin.employer.destroy');
Route::get('/admin/employers/{id}', [AdminController::class, 'showEmployer'])->name('admin.employer.show');
Route::get('/admin/all-users', [AdminController::class, 'allUsers'])->name('admin.all-users');



});

// Job Routes for All Authenticated Users
Route::middleware('auth')->group(function () {
    Route::get('jobs', [JobController::class, 'index'])->name('jobs.index'); // List all jobs
    Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show'); // Show job details
});

// Access for Employer Routes (Create, Edit, Delete Jobs)
Route::middleware(['auth', 'role:employer|admin'])->group(function () {
    Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::patch('/jobs/{job}/close', [JobController::class, 'close'])->name('jobs.close');
    Route::patch('/jobs/{job}/reopen', [JobController::class, 'reopen'])->name('jobs.reopen');
});



// Application Routes (For Users and Employers/ Admin to view and manage applications)
Route::middleware('auth')->group(function () {
    Route::get('/application', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/application/create/{jobId}', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('/application/{jobId}', [ApplicationController::class, 'store'])->name('application.store');
    Route::patch('/application/{application}', [ApplicationController::class, 'update'])->name('application.update');
});

// Routes for Employers to Manage Applications (Pending, Approved, Rejected)
Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('/application/pending', [ApplicationController::class, 'pendingApplications'])->name('application.pending');
    Route::post('/application/{application}/approve', [ApplicationController::class, 'approve'])->name('application.approve');
    Route::get('/application/approved', [ApplicationController::class, 'approvedApplications'])->name('application.approved');
    Route::get('/application/rejected', [ApplicationController::class, 'rejectedApplications'])->name('application.rejected');
    Route::post('/application/{application}/reject', [ApplicationController::class, 'reject'])->name('application.reject');
    Route::get('{application}/files/{type}/{filename}', [ApplicationController::class, 'viewFile'])->name('application.files.download');
});

// Routes for Admins to Manage Applications (Pending, Approved, Rejected)
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/application/pending', [ApplicationController::class, 'pendingApplications'])->name('application.pending');
    Route::post('/application/{application}/approve', [ApplicationController::class, 'approve'])->name('application.approve');
    Route::get('/application/approved', [ApplicationController::class, 'approvedApplications'])->name('application.approved');
    Route::get('/application/rejected', [ApplicationController::class, 'rejectedApplications'])->name('application.rejected');
    Route::post('/application/{application}/reject', [ApplicationController::class, 'reject'])->name('application.reject');
    Route::get('{application}/files/{type}/{filename}', [ApplicationController::class, 'viewFile'])->name('application.files.download');
    Route::get('/admin/applications/all', [ApplicationController::class, 'allApplications'])->name('admin.applications.all');
    Route::get('/admin/applications/pending', [ApplicationController::class, 'allPendingApplications'])->name('admin.applications.pending');
    Route::get('/admin/applications/approved', [ApplicationController::class, 'approvedApplications'])->name('admin.applications.approved');
    Route::get('/admin/applications/rejected', [ApplicationController::class, 'rejectedApplications'])->name('admin.applications.rejected');
    Route::get('/admin/applications/{application}', [ApplicationController::class, 'show'])->name('admin.applications.show');
    Route::get('/admin/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('admin.applications.edit');
    Route::get('/admin/applications/{application}/file/{type}/{filename}', [ApplicationController::class, 'viewFile'])->name('admin.applications.viewFile');
    Route::get('/admin/applications/rejected', [ApplicationController::class, 'allRejectedApplications'])->name('admin.applications.rejected');
    Route::get('/admin/applications/approved', [ApplicationController::class, 'allApprovedApplications'])->name('admin.applications.approved');
    Route::put('/admin/application/{application}', [ApplicationController::class, 'update'])->name('admin.applications.update');


});


