@extends('layouts.main')

@section('title', 'Rejected Applications')

@section('content')
<div class="py-4">
    <div class="container">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rejected Applications
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
                    @forelse($applications as $application)
                        <tr>
                            <td>{{ $application->user->username }}</td>
                            <td>{{ $application->job->title }}</td>
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
                            <td class="text-danger">
                            {{ $application->status }}
                                <span class="badge badge-danger">Rejected</span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No rejected applications found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
