*@extends('layouts.main')

@section('title', 'Profile')

@section('content')
  
            <!--  Edit Profile Form -->
            <div id="editForm" class="hidden p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.delete-user-form')
                </div>
            </div>

        </div>
    </div>
@endsection
