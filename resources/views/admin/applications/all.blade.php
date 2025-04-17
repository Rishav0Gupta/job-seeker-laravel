@extends('layouts.main')

@section('title', 'All Applications')

@section('content')

<div class="container mt-4 my-4 ">
    <h1 class="text-center p-5">All Job Applications</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @foreach ($applications as $application)
            <li class="list-group-item">
                <strong>{{ $application->job->title }}</strong> at {{ $application->job->company }}
                <span class="text-muted">Applied on {{ $application->created_at->format('d M Y') }}</span>

                <!-- Show status for admin -->
                <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>

                <p><strong>Applicant:</strong> {{ $application->user->username }}</p>
                <p><strong>Email:</strong> {{ $application->user->email }}</p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
