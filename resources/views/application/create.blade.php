@extends('layouts.main')

@section('content')

    <div class="container mt-4">
        <h2>Apply for {{ $job->title }}</h2>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form action="{{ route('application.store', $job->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="cover_letter" class="form-label">Cover Letter</label>
                <input type="file" class="form-control" id="cover_letter" name="cover_letter">
            </div>

            <div class="mb-3">
                <label for="resume" class="form-label">Upload Resume (optional)</label>
                <input type="file" class="form-control" id="resume" name="resume">
            </div>

            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>


@endsection
