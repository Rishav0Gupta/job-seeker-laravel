@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center min-vh-100 bg-light text-center">

    <h1 class="display-4 mb-4">Welcome to Job Seek</h1>
    <p class="lead text-muted mb-5">Helping you connect with the right career path</p>

    <div class="btn-group" role="group" aria-label="Login Buttons">
        <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">
            User Login
        </a>
        <a href="{{ route('admin.login') }}" class="btn btn-dark px-4 py-2">
            Admin Login
        </a>
    </div>

</div>
@endsection
