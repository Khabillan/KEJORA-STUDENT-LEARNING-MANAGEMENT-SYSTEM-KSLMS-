{{-- resources/views/enrollments/course_students.blade.php --}}
@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Students Assigned to Course</h2>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Course Code:</strong> {{ $course->getCourseCode() }}</p>
        <p><strong>Course Name:</strong> {{ $course->getCourseName() }}</p>
        <p><strong>Course Type:</strong> {{ ucfirst($course->getCourseType()) }}</p>
    </div>
</div>

@if(count($courseStudents) === 0)
    <div class="alert alert-warning">This course has no assigned student.</div>
@else
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courseStudents as $student)
                <tr>
                    <td>{{ $student->getStudentId() }}</td>
                    <td>{{ $student->getStudentName() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
@endsection
