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
        <input type="text" name="name" class="form-control" value="{{ old('name', $student->getName()) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Student Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $student->getEmail()) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Student Phone Number</label>
        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $student->getPhoneNumber()) }}">
    </div>

    <button type="submit" class="btn btn-success">Update Student</button>
</form>
@endsection
