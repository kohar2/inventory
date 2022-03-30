@extends('base')

@section('title', $department->id)
@section('description', $department->name)

@section('content')
    <h1>{{ $department->name }}</h1>
    {!! $department->name !!}
@endsection
