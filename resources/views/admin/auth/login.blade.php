@extends('layouts.main')  {{-- This will extend main.blade.php layout --}}
@section('title', 'Admin Login')  {{-- Setting the title for this page --}}

@section('content')  {{-- This section will be injected into @yield('content') in main.blade.php --}}
    <div class="container mt-5">
        <h2>Admin Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection