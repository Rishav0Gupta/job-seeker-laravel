@extends('layouts.main')

@section('title', 'All Users')

@section('content')
<div class="container my-5 p-4">
    <h2 class="text-center mb-4">All Users</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge 
                            {{ $user->role == 'admin' ? 'bg-danger' : ($user->role == 'employer' ? 'bg-primary' : 'bg-secondary') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
