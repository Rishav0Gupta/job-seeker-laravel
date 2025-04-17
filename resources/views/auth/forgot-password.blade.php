@extends('layouts.guest')

@section('content')
    <!-- Bootstrap & Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class=" p-5 rounded  shadow-sm bg-light">
        <div class="text-center mb-4">
            <h3>{{ __('Reset Your Password') }}</h3>

        </div>

        <div class="my-5"> <p>Enter the email associated with your account and we will send you password reset instructions.</p></div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
@endsection
