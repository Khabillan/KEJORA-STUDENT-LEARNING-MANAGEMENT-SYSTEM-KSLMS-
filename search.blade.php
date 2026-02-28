@extends('Layouts.app')

@section('content')
<h2>Search Course (by Code)</h2>

@if (session('not_found')) <p>{{ session('not_found') }}</p> @endif
@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
  </ul>
@endif

<form method="POST" action="{{ route('courses.search') }}">
  @csrf
  <label>Course Code</label><br>
  <input name="code"><br><br>
  <button type="submit">Search</button>
</form>

<p><a href="{{ route('courses.index') }}">View All</a></p>
@endsection