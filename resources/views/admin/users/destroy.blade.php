@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Delete User</h2>

    <p>Are you sure you want to delete <strong>{{ $user->name }}</strong> ({{ $user->email }})?</p>

    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Yes, Delete</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
