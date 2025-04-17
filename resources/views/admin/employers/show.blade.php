@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Employer Details</h2>

    <div class="card">
        <div class="card-header">
            <h3>{{ $employer->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $employer->email }}</p>
            <p><strong>Joined on:</strong> {{ $employer->created_at->toFormattedDateString() }}</p>
            <p><strong>Role:</strong> Employer</p>

            <a href="{{ route('admin.employers.edit', $employer->id) }}" class="btn btn-primary">Edit Employer</a>
            <a href="{{ route('admin.employers.index') }}" class="btn btn-secondary">Back to Employers</a>
        </div>
    </div>
</div>
@endsection
