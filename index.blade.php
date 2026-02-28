@extends('Layouts.app')
@section('content')
<h2>All Courses</h2>

@if (session('success')) <p>{{ session('success') }}</p> @endif

<p><a href="{{ route('courses.create') }}">Add Course</a> | <a href="{{ route('courses.search.form') }}">Search</a></p>

@if (count($courses) === 0)
  <p>No courses yet.</p>
@else
  <ul>
    @foreach ($courses as $c)
      <li>
        <b>{{ $c->getCode() }}</b> - {{ $c->getName() }} ({{ $c->getCreditHour() }} credit hour)
        <br>Summary: {{ $c->getSummary() }}
        <br>MS Teams: <a href="{{ $c->getMsTeamsLink() }}" target="_blank">{{ $c->getMsTeamsLink() }}</a>
        <br>
        <a href="{{ route('courses.edit', $c->getCode()) }}">Edit</a> |
        <a href="{{ route('courses.delete.confirm', $c->getCode()) }}">Delete</a>
      </li>
      <hr>
    @endforeach
  </ul>
@endif
@endsection