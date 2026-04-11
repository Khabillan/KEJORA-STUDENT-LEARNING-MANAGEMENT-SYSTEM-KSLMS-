@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Search Course</h2>

<form method="POST" action="{{ route('courses.search') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Enter Course Code</label>
        <input type="text" name="course_code" class="form-control" value="{{ old('course_code') }}">
    </div>

    <button type="submit" class="btn btn-primary">Search</button>
</form>
@endsection