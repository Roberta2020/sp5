@extends('layouts.master')
@section('content')
    @foreach ($projects as $project)
        <h1>{{ $project['title'] }}</h1>
        <p>{{ $project['text'] }}</p>
    @endforeach
@endsection   