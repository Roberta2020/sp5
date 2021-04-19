@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">{{ __('Update project') }}</div>
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <div class="card-body">
    <form action="{{ route('projects.update', $project['id']) }}" method="POST">
        @method('PUT') @csrf
        <div class="form-group row" style="justify-content: center">
        <label class="col-md-4 col-form-label" for="project_name">Project name:</label><br>
        </div>
        <div class="form-group row" style="justify-content: center">
        <input class="col-md-4 col-form-label" type="text" name="project_name" value="{{ $project['project_name'] }}"><br>
        </div>
        <div class="form-group row" style="justify-content: center">
        <label class="col-md-4 col-form-label" for="project_city">Project city:</label><br>
        </div>
        <div class="form-group row" style="justify-content: center">
        <input class="col-md-4 col-form-label" type="text" name="project_city" value="{{ $project['project_city'] }}"><br>
        </div>
        <br><br>
        <div class="form-group row" style="justify-content: center">
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
        </div>
    </div>
    </form>
    </div>
</div>
<hr>
<div class="card">
    <div class="card-header">{{ __('Attach project') }}</div>
    @foreach ($project->employees as $employee)
        <p {{ $employee['employee_name'] }}></p>
    @endforeach
    <div class="card-body">
    <form action="{{ route('projects.employees.store', $project['id']) }}" method="POST">
        @csrf
        <div class="form-group row" style="justify-content: center">
        <label class="col-md-4 col-form-label" for="employee_name">Employee name:</label><br>
        </div>
        <div class="form-group row" style="justify-content: center">
        <input class="col-md-4 col-form-label" type="text" name="employee_name"><br>
        </div>
        <br><br>
        <div class="form-group row" style="justify-content: center">
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="ATTACH EMPLOYEE">
        </div>
    </form>
    </div>
    <div class="form-group row" style="justify-content: center">
    <a href="/projects" class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68); color:black">BACK</a>
    </div>
</div>
@endsection

