@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Add Course</h2>

<form method="POST" action="{{ route('courses.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Course Code</label>
        <input type="text" name="course_code" class="form-control" value="{{ old('course_code') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Course Type</label>
        <select name="course_type" class="form-control">
            <option value="">Select Course Type</option>
            <option value="core" {{ old('course_type') == 'core' ? 'selected' : '' }}>Core</option>
            <option value="elective" {{ old('course_type') == 'elective' ? 'selected' : '' }}>Elective</option>
            <option value="university" {{ old('course_type') == 'university' ? 'selected' : '' }}>University</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection