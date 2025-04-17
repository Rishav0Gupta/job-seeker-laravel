@extends('layouts.main')  {{-- This will extend main.blade.php layout --}}
@section('title', 'Admin Login')  {{-- Setting the title for this page --}}

@section('content')  {{-- This section will be injected into @yield('content') in main.blade.php --}}
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px;">

        {{-- Error Message --}}
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <h3 class="text-center mb-3">Admin Login</h3>

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf

            {{-- Email Address --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            {{-- Login Button --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </form>
    </div>
</div>
@endsection
