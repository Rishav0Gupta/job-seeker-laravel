<form action="{{ route('applications.store') }}" method="POST">
    @csrf
    <input type="hidden" name="job_id" value="{{ $job->id }}">

    <button type="submit" class="btn btn-primary">Apply Now</button>
</form>
