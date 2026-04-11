@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Student Found</h2>

<div class="card">
    <div class="card-body">
        <p><strong>Student ID:</strong> {{ $student->getStudentId() }}</p>
        <p><strong>Student Name:</strong> {{ $student->getStudentName() }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('students.edit', $student->getStudentId()) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('students.delete.confirm', $student->getStudentId()) }}" class="btn btn-danger">Delete</a>
    <a href="{{ route('students.courses', $student->getStudentId()) }}" class="btn btn-info">View Courses</a>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">View All</a>
</div>
@endsection