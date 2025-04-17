<!-- Bootstrap & Custom CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


@extends('layouts.main')

@section('title', 'Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded" style="width: 100%; max-width: 400px;">

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="text-center mb-3">Register</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required autofocus>
                <x-input-error :messages="$errors->get('username')" class="text-danger mt-1" />
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" class="form-control" type="password" name="password" required>
                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-1" />
            </div>

            <!-- Register Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-success">Register</button>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <a class="text-decoration-none text-primary" href="{{ route('login') }}">
                    Already have an account? Log in here
                </a>
            </div>

        </form>
    </div>
</div>
@endsection