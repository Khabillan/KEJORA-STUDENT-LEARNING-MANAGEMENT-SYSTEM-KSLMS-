@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Edit Course</h2>

<form method="POST" action="{{ route('courses.update', $course->getCourseCode()) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Course Code (Not Editable)</label>
        <input type="text" class="form-control" value="{{ $course->getCourseCode() }}" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" name="course_name" class="form-control" value="{{ old('course_name', $course->getCourseName()) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Course Type</label>
        <select name="course_type" class="form-control">
            <option value="core" {{ old('course_type', $course->getCourseType()) == 'core' ? 'selected' : '' }}>Core</option>
            <option value="elective" {{ old('course_type', $course->getCourseType()) == 'elective' ? 'selected' : '' }}>Elective</option>
            <option value="university" {{ old('course_type', $course->getCourseType()) == 'university' ? 'selected' : '' }}>University</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update Course</button>
</form>
@endsection