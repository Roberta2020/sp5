@extends('layouts.master')
@section('content')
    {{-- Validation error --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {{-- Database error --}}
    @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif

    <h2 style="font-family: 'Kanit', sans-serif; text-align:center">Employees</h2>
    <table class="table" style="font-family: 'Kanit', sans-serif;">
        <thead style="background: linear-gradient(130deg, #ffa34f, #ff6f68);">
            <tr>
                <th>ID</th>
                <th>Employee name</th>
                <th>Attached projects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee['id'] }}</td>
                    <td>{{ $employee['employee_name'] }}</td>
                    <td>{{ $employee['project_id'] }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
                            @method('DELETE') @csrf
                            <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit"
                                value="DELETE">
                        </form>
                        <form class="d-inline" action="{{ route('employees.show', $employee['id']) }}" method="GET">
                            <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit"
                                value="UPDATE">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <hr>
    <form method="POST" action="/employees">
        @csrf
        @error('employee_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="employee_name">Employee name:</label><br>
        <input type="text" id="employee_name" name="employee_name"><br>
        @error('project_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="project_id">Attached projects:</label><br>
        <input type="text" id="project_id" name="project_id"><br><br>
        <input class="btn" type="submit" value="Submit" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);">
    </form>
@endsection





