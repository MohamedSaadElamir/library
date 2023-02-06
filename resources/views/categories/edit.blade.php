@extends('layout')

@section('title')
Edit Category - {{$category->name}}
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">  
    @csrf 
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name') ?? $category->name}}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>   
@endsection