@extends('layouts.main')

@section('content')
<div class="container my-4 p-4">
    <h2 class="text-center p-5">User Details</h2>

    <div class="card">
        <div class="">
            <h3>{{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Joined on:</strong> {{ $user->created_at->toFormattedDateString() }}</p>
            <p><strong>Role:</strong> User</p>

            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
</div>
@endsection
