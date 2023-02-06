@extends('layout')

@section('title')
Create Category
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">  
    @csrf 
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>   
@endsection