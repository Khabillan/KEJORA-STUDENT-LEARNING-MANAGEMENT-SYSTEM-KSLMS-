@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Confirm Delete Course</h2>

<div class="card">
    <div class="card-body">
        <p><strong>Course Code:</strong> {{ $course->getCourseCode() }}</p>
        <p><strong>Course Name:</strong> {{ $course->getCourseName() }}</p>
        <p><strong>Course Type:</strong> {{ ucfirst($course->getCourseType()) }}</p>

        <p class="text-danger mt-3">Are you sure you want to delete this course?</p>

        <form method="POST" action="{{ route('courses.destroy', $course->getCourseCode()) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection