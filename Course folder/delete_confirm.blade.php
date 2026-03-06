@extends('Layouts.app')

@section('content')
<h2>Confirm Delete</h2>

<p>Are you sure you want to delete this course?</p>

<p><b>{{ $course->getCode() }}</b> - {{ $course->getName() }}</p>
<p>Credit: {{ $course->getCreditHour() }}</p>
<p>Summary: {{ $course->getSummary() }}</p>

<form method="POST" action="{{ route('courses.destroy', $course->getCode()) }}">
  @csrf
  @method('DELETE')
  <button type="submit">Yes, Delete</button>
</form>

<p><a href="{{ route('courses.index') }}">Cancel / View All</a></p>
@endsection