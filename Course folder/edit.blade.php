@extends('Layouts.app')

@section('content')
<h2>Edit Course</h2>

@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('courses.update', $course->getCode()) }}">
  @csrf
  @method('PUT')

  <label>Course Code (Not editable)</label><br>
  <input value="{{ $course->getCode() }}" disabled><br><br>

  <label>Course Name</label><br>
  <input name="name" value="{{ old('name', $course->getName()) }}"><br><br>

  <label>Credit Hour</label><br>
  <input type="number" name="credit_hour" value="{{ old('credit_hour', $course->getCreditHour()) }}"><br><br>

  <label>Summary</label><br>
  <textarea name="summary">{{ old('summary', $course->getSummary()) }}</textarea><br><br>

  <label>MS Teams Link</label><br>
  <input name="ms_teams_link" value="{{ old('ms_teams_link', $course->getMsTeamsLink()) }}"><br><br>

  <button type="submit">Save</button>
</form>

<p><a href="{{ route('courses.index') }}">View All</a></p>
@endsection