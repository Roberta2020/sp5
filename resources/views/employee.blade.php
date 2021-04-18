@extends('layouts.master')
@section('content')
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="employee_name" value="{{ $employee['employee_name'] }}"><br>
        <input type="text" name="project_id" value="{{ $employee['project_id'] }}"><br>
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
    </form>

{{-- 
    @foreach ($project->employees as $employee)
        <p {{ $employee['employee_name'] }}></p>
    @endforeach
    <form action="{{ route('projects.employees.store', $project['id']) }}" method="POST">
        @csrf
        <input type="text" name="employee_name"><br>
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit"
            value="ADD EMPLOYEE">
    </form>
@endsection --}}
