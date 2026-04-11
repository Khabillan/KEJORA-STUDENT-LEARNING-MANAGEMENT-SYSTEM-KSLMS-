@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Add Student</h2>

<form method="POST" action="{{ route('students.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Student ID</label>
        <input type="text" name="student_id" class="form-control" value="{{ old('student_id') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" name="student_name" class="form-control" value="{{ old('student_name') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
