@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Confirm Delete Student</h2>

<div class="card">
    <div class="card-body">
        <p><strong>Student ID:</strong> {{ $student->getStudentId() }}</p>
        <p><strong>Student Name:</strong> {{ $student->getStudentName() }}</p>

        <p class="text-danger mt-3">Are you sure you want to delete this student?</p>

        <form method="POST" action="{{ route('students.destroy', $student->getStudentId()) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection