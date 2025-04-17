@extends('layouts.main')

@section('title', 'Pending Applications')

@section('content')
<div class="py-4">
    <div class="container">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pending Applications
        </h2>

        <div class="mt-4">
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>Applicant Name</th>
            <th>Job Title</th>
            <th>Cover Letter</th>
            <th>Resume</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $application)
        <tr>
            <td>{{ $application->user->username }}</td> <!-- Accessing the user's name -->
            <td>{{ $application->job->title }}</td> <!-- Accessing the job's title -->
            <td>
        @if($application->cover_letter)
        <a href="{{ route('application.files.download', ['application' => $application->id, 'type' => 'cover_letters', 'filename' => basename($application->cover_letter)]) }}" target="_blank">View Cover Letter</a>
        @else
            N/A
        @endif
    </td>
           
            <td>
                @if($application->resume)
                <a href="{{ route('application.files.download', ['application' => $application->id, 'type' => 'resumes', 'filename' => basename($application->resume)]) }}" target="_blank">View Resume</a>
                @else
                    No resume uploaded
                @endif
            </td>
            <td>
    @if($application->status === 'pending')
        <div class="d-flex gap-2">
            <form action="{{ route('application.approve', $application->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
            </form>

            <form action="{{ route('application.reject', $application->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
            </form>
        </div>
    @elseif($application->status === 'approved')
        <span class="badge badge-success">Approved</span>
    @elseif($application->status === 'rejected')
        <span class="badge badge-danger">Rejected</span>
    @endif
</td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>
@endsection
