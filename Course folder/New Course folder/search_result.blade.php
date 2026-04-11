@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Course Found</h2>

<div class="card">
    <div class="card-body">
        <p><strong>Course Code:</strong> {{ $course->getCourseCode() }}</p>
        <p><strong>Course Name:</strong> {{ $course->getCourseName() }}</p>
        <p><strong>Course Type:</strong> {{ ucfirst($course->getCourseType()) }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('courses.edit', $course->getCourseCode()) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('courses.delete.confirm', $course->getCourseCode()) }}" class="btn btn-danger">Delete</a>
    <a href="{{ route('courses.students', $course->getCourseCode()) }}" class="btn btn-info">View Students</a>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">View All</a>
</div>
@endsection