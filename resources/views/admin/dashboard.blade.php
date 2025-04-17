<div class="col-md-4">
    <div class="card shadow-sm p-3 mb-4">
        <h5 class="card-title">
            <i class="fa fa-users"></i> All Users
        </h5>
        <form method="POST" action="{{ route('admin.login') }}">
        <a href="{{ route('admin.all-users') }}" class="btn btn-info">View Users</a>
    </div>
</div>

<!-- Total Jobs -->
<div class="col-md-4">
    <div class="card shadow-sm p-3 mb-4">
        <h5 class="card-title">
            <i class="fa fa-briefcase"></i> Total Jobs
        </h5>

    </div>
</div>
