@extends('layouts.main')

@section('title', 'Post a Job')

@section('content')


    <div class="container p-5 my-5 border rounded">
    
        <h2>Post a Job</h2>

        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Job Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Company Name</label>
                <input type="text" name="company" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Salary</label>
                <input type="number" name="salary" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Job Type</label>
                <select name="type" class="form-control">
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Freelance">Freelance</option>
                    <option value="Internship">Internship</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Job Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Post Job</button>
        </form>
    </div>
@endsection
