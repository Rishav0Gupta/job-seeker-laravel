@extends('layouts.main')  

@section('title', 'Dashboard')

@section('content')
<div class="py-4">
    <div class="container">
        <div class="card shadow-sm p-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <p class="text-gray-900">{{ __("You're logged in!") }}</p>
        </div>
    </div>
</div>
@endsection


