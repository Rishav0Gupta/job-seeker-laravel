@extends('layouts.main')

@section('title', 'Edit Job')

@section('content')
    <div class="container border rounded my-5 p-5">
        <h2>Edit Job</h2>

        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Job Title</label>
                <input type="text" name="title" class="form-control" value="{{ $job->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" name="company" class="form-control" value="{{ $job->company }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" value="{{ $job->location }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control" value="{{ $job->salary }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Job Type</label>
                <select name="type" class="form-control">
                    <option value="Full-time" {{ $job->type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ $job->type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Freelance" {{ $job->type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="Internship" {{ $job->type == 'Internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Job Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $job->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Job</button>
        </form>
    </div>
@endsection
