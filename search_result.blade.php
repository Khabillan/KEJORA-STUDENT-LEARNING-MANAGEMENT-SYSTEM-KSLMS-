@extends('Layouts.app')

@section('content')
<h2>Course Found</h2>

<p><b>Name:</b> {{ $course->getName() }}</p>
<p><b>Code:</b> {{ $course->getCode() }}</p>
<p><b>Credit Hour:</b> {{ $course->getCreditHour() }}</p>
<p><b>Summary:</b> {{ $course->getSummary() }}</p>
<p><b>MS Teams Link:</b> <a href="{{ $course->getMsTeamsLink() }}" target="_blank">{{ $course->getMsTeamsLink() }}</a></p>

<p>
  <a href="{{ route('courses.edit', $course->getCode()) }}">Edit</a> |
  <a href="{{ route('courses.delete.confirm', $course->getCode()) }}">Delete</a> |
  <a href="{{ route('courses.index') }}">View All</a>
</p>
@endsection