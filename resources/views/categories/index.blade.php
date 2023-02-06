@extends('layout')

@section('title')
   All Categories
@endsection

@section('content')

    <h1>All Categories</h1>

    <a class="btn btn-primary" href="{{route('categories.create')}}">Create</a>

    @foreach ($categories as $category)
    <hr>
    <a href="{{ route('categories.show', $category->id) }}">
        <h3>{{$category->name}}</h3>
    </a>
    
    <a class="btn btn-success" href="{{route('categories.edit', $category->id)}}">Edit</a>
    <a class="btn btn-danger" href="{{route('categories.delete', $category->id)}}">Delete</a>
    <hr>

    @endforeach
    {{ $categories->render() }}

@endsection