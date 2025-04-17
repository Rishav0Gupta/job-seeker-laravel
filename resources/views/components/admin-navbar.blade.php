<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <div class="ms-auto">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light me-2">Dashboard</a>
            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>
