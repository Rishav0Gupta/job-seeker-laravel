@extends('layouts.main')

@section('content')
<div class="container my-4">
    <h2 class="text-center p-5">Application Details</h2>

    <div class="card">
        <div class="card-header">
            <h4>{{ $application->job->title }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Applicant:</strong> {{ $application->user->username }}</p>
            <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
            <p><strong>Applied on:</strong> {{ $application->created_at->format('d M Y') }}</p>

            <div>
                <strong>Cover Letter:</strong>
                @if ($application->cover_letter)
                    <a href="{{ route('admin.applications.viewFile', ['application' => $application->id, 'type' => 'cover_letters', 'filename' => basename($application->cover_letter)]) }}">View</a>
                @else
                    <p>No cover letter uploaded</p>
                @endif
            </div>

            <div>
                <strong>Resume:</strong>
                @if ($application->resume)
                    <a href="{{ route('admin.applications.viewFile', ['application' => $application->id, 'type' => 'resumes', 'filename' => basename($application->resume)]) }}">View</a>
                @else
                    <p>No resume uploaded</p>
                @endif
            </div>

            <a href="{{ route('admin.applications.pending') }}" class="btn btn-secondary mt-3">Back to Pending Applications</a>
        </div>
    </div>
</div>
@endsection
