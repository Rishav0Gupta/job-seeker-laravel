@extends('layouts.main')

@section('content')
<div class="container my-4">
    <h2  class="text-center p-5">Edit Application</h2>

    <form action="{{ route('admin.applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $application->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $application->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $application->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Application</button>
    </form>

    <a href="{{ route('admin.applications.pending') }}" class="btn btn-secondary mt-3">Back to Pending Applications</a>
</div>
@endsection
