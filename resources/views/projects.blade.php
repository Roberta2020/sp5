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

    <h2 style="font-family: 'Kanit', sans-serif; text-align:center">Projects</h2>
    <table class="table" style="font-family: 'Kanit', sans-serif;">
        <thead style="background: linear-gradient(130deg, #ffa34f, #ff6f68);">
            <tr>
                <th>ID</th>
                <th>Project name</th>
                <th>Project employees</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project['id'] }}</td>
                    <td>{{ $project['project_name'] }}</td>
                    <td>{{ $project['project_employees'] }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                            @method('DELETE') @csrf
                            <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="DELETE">
                        </form> 
                        <form class="d-inline" action="{{ route('projects.show', $project['id']) }}" method="GET">
                            <input class="btn" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);" type="submit" value="UPDATE">
                        </form>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <hr>
    <form method="POST" action="/projects">
        @csrf
        @error('project_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="project_name">Project name:</label><br>
        <input type="text" id="project_name" name="project_name"><br>
        @error('project_employees')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="project_employees">Project employees:</label><br>
        <input type="text" id="project_employees" name="project_employees"><br><br>
        <input class="btn" type="submit" value="Submit" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);">
    </form>
@endsection
