@extends('layout')

@section('title')
Create Book
@endsection

@section('content')

<form method="POST" action="{{ route('books.store') }}">  
    @csrf 
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Title">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" rows="3" placeholder="Description"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>   
@endsection