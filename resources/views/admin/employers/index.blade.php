@extends('layouts.main')

@section('content')
<div class="container my-4 p-4">
    <h2  class="text-center p-5">Employers</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employers as $employer)
            <tr>
                <td>{{ $employer->username }}</td>
                <td>{{ $employer->email }}</td>
                <td>{{ $employer->role }}</td>
                <td>
                    <a href="{{ route('admin.employer.show', $employer->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('admin.employer.edit', $employer->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.employer.destroy', $employer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</div>
@endsection
