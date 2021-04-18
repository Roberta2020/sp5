@extends('layouts.master')
@section('content')
<div class="col-md-8">
    <h2>Update employee</h2>
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
        @method('PUT') @csrf
        <input type="text" name="employee_name" value="{{ $employee['employee_name'] }}"><br>
        <select name="project_id" id="project_id">
            <option value="">--- None ---</option>
            @foreach (App\Models\Project::all() as $project)
                <option value="{{ $project['id'] }}" {{ $employee['project_id'] == $project['id'] ? 'selected' : '' }}>
                    {{ $project['project_name'] }}</option>
            @endforeach
        </select><br><br>
        <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
        <a href="/employees" class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68); color:black">CANCEL</a>
    </form>
</div>
@endsection
