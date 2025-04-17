@extends('layouts.main')

@section('title', 'Job Listings')

@section('content')
    <div class="container pt-5">
        <h2 class="text-center">Job Listings</h2>

        @if(in_array(auth()->user()->role, ['employer', 'admin']))

        <a href="{{ route('jobs.create') }}" class="btn btn-edit">Post a Job</a>

        <!-- Display active and closed job counts -->
        <div class="mt-4">
            <p>Active Jobs: {{ $activeJobs }}</p>
            <p>Closed Jobs: {{ $closedJobs }}</p>
        </div>
        @endif

        <ul class="list-group mt-3">
            @foreach ($jobs as $job)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('jobs.show', $job->id) }}" class="fw-bold text-job">{{ $job->title }}</a>
                    <br>
                    <small>{{ $job->company }} - {{ $job->location }}</small>
        </div>

        @if(auth()->user()->role === 'employer' || auth()->user()->role === 'admin')
        @if($job->status === 'active')
    <form action="{{ route('jobs.close', $job->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-danger">Close Job</button>
    </form>
@endif

@if($job->status === 'closed')
    <form action="{{ route('jobs.reopen', $job->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-success btn-sm">Reopen</button>
    </form>
@endif
@endif


                @auth
                    @if (auth()->user()->role === 'user')
                        <a href="{{ route('application.create', $job->id) }}" class="btn btn-sm btn-success">Apply</a>
                    @endif
                @endauth
            </li>
            @endforeach
        </ul>

        <div class="d-flex justify-content-center mt-4">
            {{ $jobs->links() }}
        </div>


    </div>
@endsection
