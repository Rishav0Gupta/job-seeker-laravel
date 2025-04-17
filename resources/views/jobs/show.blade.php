@extends('layouts.main')

@section('title', $job->title)

@section('content')
<div class="container py-5">
    <div class="card shadow rounded p-4">
        <h2 class="mb-3">{{ $job->title }}</h2>

        <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item"><strong>Company:</strong> {{ $job->company }}</li>
            <li class="list-group-item"><strong>Location:</strong> {{ $job->location }}</li>
            <li class="list-group-item"><strong>Salary:</strong> 
                {{ $job->salary ? '$' . number_format($job->salary, 2) : 'Not specified' }}
            </li>
            <li class="list-group-item"><strong>Job Type:</strong> {{ $job->type }}</li>
            <li class="list-group-item"><strong>Description:</strong> {{ $job->description }}</li>
        </ul>

        <div class="d-flex flex-wrap gap-2 mt-3">
            {{-- Only show edit/delete to job owner --}}
            @if(auth()->id() === $job->user_id)
                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Delete</button>
                </form>
            @endif

            {{-- Only users can apply --}}
            @if(auth()->user()->role === 'user')
                <a href="{{ route('application.create', $job->id) }}" class="btn btn-primary">Apply for this Job</a>
            @endif

            <a href="{{ route('jobs.index') }}" class="btn btn-list">Back to Listings</a>
        </div>
    </div>
</div>
@endsection
