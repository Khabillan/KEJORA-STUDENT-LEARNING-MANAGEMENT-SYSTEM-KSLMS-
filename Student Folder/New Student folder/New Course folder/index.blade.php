@extends('Layouts.app')

@section('content')
<h2 class="mb-4">All Courses</h2>

@if(count($courses) === 0)
    <div class="alert alert-info">No courses available.</div>
@else
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Course Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{ $course->getCourseCode() }}</td>
                <td>{{ $course->getCourseName() }}</td>
                <td>{{ ucfirst($course->getCourseType()) }}</td>
                <td>
                    <a href="{{ route('courses.edit', $course->getCourseCode()) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('courses.delete.confirm', $course->getCourseCode()) }}" class="btn btn-danger btn-sm">Delete</a>
                    <a href="{{ route('courses.students', $course->getCourseCode()) }}" class="btn btn-info btn-sm">View Students</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection