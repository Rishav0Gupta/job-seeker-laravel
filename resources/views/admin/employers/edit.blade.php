@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Employer</h2>

    <form action="{{ route('admin.employers.update', $employer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $employer->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $employer->email) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update Employer</button>
    </form>
</div>
@endsection
