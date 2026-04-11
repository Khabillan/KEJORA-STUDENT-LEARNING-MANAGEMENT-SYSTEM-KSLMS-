@extends('Layouts.enrollment')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Assign Student to Course</h4>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('enrollments.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Student ID</label>
                <input
                    type="text"
                    name="student_id"
                    class="form-control"
                    list="studentList"
                    placeholder="Enter Student ID"
                    value="{{ old('student_id') }}"
                >
                <datalist id="studentList"></datalist>
            </div>

            <div class="mb-3">
                <label class="form-label">Course Code</label>
                <input
                    type="text"
                    name="course_code"
                    class="form-control"
                    list="courseList"
                    placeholder="Enter Course Code"
                    value="{{ old('course_code') }}"
                >
                <datalist id="courseList"></datalist>
            </div>

            <button type="submit" class="btn btn-success">Assign Course to Student</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async function () {
    const studentList = document.getElementById('studentList');
    const courseList = document.getElementById('courseList');

    try {
        let studentIds = JSON.parse(localStorage.getItem('student_ids'));
        let courseCodes = JSON.parse(localStorage.getItem('course_codes'));

        if (!studentIds) {
            const studentResponse = await fetch('/student-ids');
            studentIds = await studentResponse.json();
            localStorage.setItem('student_ids', JSON.stringify(studentIds));
        }

        if (!courseCodes) {
            const courseResponse = await fetch('/course-codes');
            courseCodes = await courseResponse.json();
            localStorage.setItem('course_codes', JSON.stringify(courseCodes));
        }

        studentList.innerHTML = '';
        courseList.innerHTML = '';

        studentIds.forEach(id => {
            const option = document.createElement('option');
            option.value = id;
            studentList.appendChild(option);
        });

        courseCodes.forEach(code => {
            const option = document.createElement('option');
            option.value = code;
            courseList.appendChild(option);
        });
    } catch (error) {
        console.error('Error loading suggestions:', error);
    }
});
</script>
@endsection