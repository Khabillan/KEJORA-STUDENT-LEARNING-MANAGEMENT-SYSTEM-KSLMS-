{{-- resources/views/enrollments/student_courses.blade.php --}}
@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Courses Enrolled by Student</h2>

<div class="card mb-3">
    <div class="card-body">
        <p><strong>Student ID:</strong> {{ $student->getStudentId() }}</p>
        <p><strong>Student Name:</strong> {{ $student->getStudentName() }}</p>
    </div>
</div>

@if(count($studentCourses) === 0)
    <div class="alert alert-warning">This student has no assigned course.</div>
@else
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Course Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentCourses as $course)
                <tr>
                    <td>{{ $course->getCourseCode() }}</td>
                    <td>{{ $course->getCourseName() }}</td>
                    <td>{{ ucfirst($course->getCourseType()) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
@endsection