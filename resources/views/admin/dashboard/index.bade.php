@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded shadow">Total Jobs: {{ $jobs }}</div>
        <div class="bg-white p-6 rounded shadow">Total Applications: {{ $applications }}</div>
        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</form>

    </div>
</div>
@endsection
