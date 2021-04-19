@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">{{ __('Update employee') }}</div>
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
    <div class="card-body">
    <form action="{{ route('employees.update', $employee['id']) }}" method="POST">
        @method('PUT') @csrf
        <div class="form-group row" style="justify-content: center">
        <input class="col-md-4 col-form-label" type="text" name="employee_name" value="{{ $employee['employee_name'] }}"><br>
        </div>
        <div class="form-group row" style="justify-content: center">
        <select class="col-md-4 col-form-label" name="project_id" id="project_id">
            <option value="">--- None ---</option>
            @foreach (App\Models\Project::all() as $project)
                <option value="{{ $project['id'] }}" {{ $employee['project_id'] == $project['id'] ? 'selected' : '' }}>
                    {{ $project['project_name'] }}</option>
            @endforeach
        </select>
        </div>
        <br><br>
        <div class="form-group row" style="justify-content: center">
            <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
        </div>
            <div class="form-group row" style="justify-content: center">
            <a href="/employees" class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68); color:black">BACK</a>
        </div>
        </div>
    </form>
    </div>
</div>
@endsection
