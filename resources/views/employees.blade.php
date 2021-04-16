@extends('layouts.master')
@section('content')
    @foreach ($employees as $employee)
        <h1>{{ $employee['title'] }}</h1>
        <p>{{ $employee['text'] }}</p>
    @endforeach
@endsection   




