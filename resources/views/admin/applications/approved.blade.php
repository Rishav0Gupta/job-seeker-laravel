@extends('layouts.main')

@section('content')
<div class="container my-4 p-4">
    <h2 class="text-center p-5">Approved Applications</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Job Title</th>
                <th>Applicant</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
            <tr>
                <td>{{ $application->job->title }}</td>
                <td>{{ $application->user->username }}</td>
                <td>{{ ucfirst($application->status) }}</td>
                <td>
                    <a href="{{ route('admin.applications.show', $application->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('admin.applications.edit', $application->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
