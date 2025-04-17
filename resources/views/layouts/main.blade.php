<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'My Website')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- Navbar based on Auth Status --}}
    @if (!request()->is('/')) {{-- Hides navbar only on welcome page --}}
    @auth
        <x-navbar />
    @else
        <x-guest-navbar />
    @endauth
@endif

    <div class="min-vh-100 bg-light">
        <main class="container mt-5">
            @yield('content')  {{-- This is where the content from login.blade.php will be rendered --}}
        </main>
    </div>

    {{-- Footer --}}
    <footer class="text-center py-4 text-muted bg-white border-top">
        &copy; {{ date('Y') }} Job Seek. All rights reserved.
    </footer>

    {{-- Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
