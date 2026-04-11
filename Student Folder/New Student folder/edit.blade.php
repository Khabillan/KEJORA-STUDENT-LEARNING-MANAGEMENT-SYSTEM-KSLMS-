@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Edit Student</h2>

<form method="POST" action="{{ route('students.update', $student->getStudentId()) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Student ID (Not Editable)</label>
        <input type="text" class="form-control" value="{{ $student->getStudentId() }}" disabled>
    </div>

    <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" name="student_name" class="form-control" value="{{ old('student_name', $student->getStudentName()) }}">
    </div>

    <button type="submit" class="btn btn-success">Update Student</button>
</form>
@endsection