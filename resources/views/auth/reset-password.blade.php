@extends('layouts.guest') {{-- Adjust path based on your folder structure --}}

@section('title', 'Reset Password')

@section('content')
    <h3 class="text-center mb-4">Reset Password</h3>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Hidden token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $request->email) }}" required autofocus />
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input id="password" type="password" class="form-control" name="password" required />
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required />
            @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Reset Password</button>
        </div>
    </form>
@endsection
