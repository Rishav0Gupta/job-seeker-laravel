@extends('layouts.main')

@section('content')
<div class="container my-4 p-4">
    <h2 class="text-center p-5">Edit User</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->username) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
    </form>
</div>
@endsection
