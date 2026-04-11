<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Learning Management System</title>

    <!-- Bootstrap 5 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('courses.index') }}">Kejora Student Learning Management System</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navSLMS">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navSLMS">
            <ul class="navbar-nav ms-auto">

                 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.create') }}">Add Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">View Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.search.form') }}">Search Course</a>
                </li>

                   
                <li class="nav-item">
                       <a class="nav-link" href="{{ route('students.create') }}">Add Student</a>
                 </li>
                 <li class="nav-item">
                       <a class="nav-link" href="{{ route('students.index') }}">View Students</a>
                 </li>
                 <li class="nav-item">
                       <a class="nav-link" href="{{ route('students.search.form') }}">Search Student</a>
                 </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('not_found'))
        <div class="alert alert-danger">{{ session('not_found') }}</div>
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

    {{-- Main content --}}
    <div class="card shadow-sm">
        <div class="card-body">
            @yield('content')
        </div>
    </div>

</div>

<footer class="text-center text-muted py-3">
    <small>© {{ date('Y') }} SLMS</small>
</footer>

<!-- Bootstrap JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
