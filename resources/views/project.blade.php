@extends('layouts.master')
@section('content')
<div class="col-md-8">
    <h2>Update project</h2>
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <form action="{{ route('projects.update', $project['id']) }}" method="POST">
        @method('PUT') @csrf
        <label for="project_name">Project name:</label><br>
        <input type="text" name="project_name" value="{{ $project['project_name'] }}"><br>
        <label for="project_city">Project city:</label><br>
        <input type="text" name="project_city" value="{{ $project['project_city'] }}"><br>
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
    </form>
</div>

<div class="col-md-8">
    <h2>Attach project</h2>
    @foreach ($project->employees as $employee)
        <p {{ $employee['employee_name'] }}></p>
    @endforeach
    <form action="{{ route('projects.employees.store', $project['id']) }}" method="POST">
        @csrf
        <label for="employee_name">Employee name:</label><br>
        <input type="text" name="employee_name"><br>
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="ATTACH EMPLOYEE">
    </form>
    <a href="/projects" class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68); color:black">BACK</a>
</div>
@endsection

