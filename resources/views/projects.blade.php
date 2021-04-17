@extends('layouts.master')
@section('content')
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
                <td></td>
            </tr> 
    @endforeach                
        </tbody>
    </table>
    <br>
    <hr>
    <form method="POST" action="/projects">
        @csrf
        <label for="project_name">Project name:</label><br>
        <input type="text" id="project_name" name="project_name"><br>
        <label for="project_employees">Project employees:</label><br>
        <input type="text" id="project_employees" name="project_employees"><br><br>
        <input class="btn" type="submit" value="Submit" style="background: linear-gradient(130deg, #ffa34f, #ff6f68);">
    </form>
@endsection   