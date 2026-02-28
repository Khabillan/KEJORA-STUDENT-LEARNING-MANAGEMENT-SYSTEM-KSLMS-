@extends('Layouts.app')

@section('content')
<h3 class="mb-3">Add Course</h3>

<form method="POST" action="{{ route('courses.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Course Name (Full Name)</label>
        <input class="form-control" name="name" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Course Code</label>
        <input class="form-control" name="code" value="{{ old('code') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Course Credit Hour</label>
        <input type="number" class="form-control" name="credit_hour" value="{{ old('credit_hour') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Course Summary</label>
        <textarea class="form-control" name="summary" rows="3">{{ old('summary') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Course MS Teams Link</label>
        <input class="form-control" name="ms_teams_link" value="{{ old('ms_teams_link') }}">
    </div>

    <button class="btn btn-primary">Submit</button>
</form>
@endsection
