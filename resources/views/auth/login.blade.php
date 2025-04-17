<!-- Bootstrap & Custom CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">




@extends('layouts.main')

@section('title', 'login')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px;">
        
        <!-- Success Message After Registration -->
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h3 class="text-center mb-3">Login</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>

            <!-- Login Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>

            <!-- Forgot Password & Register Links -->
            <div class="text-center mt-3">
                @if (Route::has('password.request'))
                    <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
                <br>
                <a class="text-decoration-none text-primary" href="{{ route('register') }}">Don't have an account? Register here</a>
            </div>

        </form>
    </div>
</div>
@endsection