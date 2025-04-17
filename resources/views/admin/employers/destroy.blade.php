@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Delete Employer</h2>

    <p>Are you sure you want to delete <strong>{{ $employer->name }}</strong> ({{ $employer->email }})?</p>

    <form action="{{ route('admin.employers.destroy', $employer->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('admin.employers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
