@extends('Layouts.app')

@section('content')
<h2 class="mb-4">All Students</h2>

@if(count($students) === 0)
    <div class="alert alert-info">No students available.</div>
@else
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Name</th>
                <th>Student ID</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->getName() }}</td>
                <td>{{ $student->getStudentId() }}</td>
                <td>{{ $student->getEmail() }}</td>
                <td>{{ $student->getPhoneNumber() }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->getStudentId()) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('students.delete.confirm', $student->getStudentId()) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection
