@extends('Layouts.app')

@section('content')
<h2 class="mb-4">Search Student</h2>

<form method="POST" action="{{ route('students.search') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Enter Student ID</label>
        <input type="text" name="student_id" class="form-control" value="{{ old('student_id') }}">
    </div>

    <button type="submit" class="btn btn-primary">Search</button>
</form>
@endsection