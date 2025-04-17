@extends('layouts.main')

@section('title', 'Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Profile Card -->
            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-profile text-white">
                    <h4 class="mb-0">Profile Information</h4>
                    <small class="text-light">Here is your account information.</small>
                </div>
                <div class="card-body">
                    <p class="mb-3"><strong>Name:</strong> {{ auth()->user()->username ?? 'N/A' }}</p>
                    <p class="mb-3"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p class="mb-3"><strong>Role:</strong> 
                        <span class="badge bg-secondary text-capitalize">{{ auth()->user()->role }}</span>
                    </p>

                    <a href="{{ route('profile.edit') }}" class="btn btn-edit mt-3">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

       
        

