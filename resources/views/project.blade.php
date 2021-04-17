@extends('layouts.master')
@section('content')
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <form action="{{ route('projects.update', $project['id']) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="project_name" value="{{ $project['project_name'] }}"><br>
        <input type="text" name="project_employees" value="{{ $project['project_employees'] }}"><br>
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
    </form>
@endsection
