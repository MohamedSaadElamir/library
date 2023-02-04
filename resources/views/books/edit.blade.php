@extends('layout')

@section('title')
Edit book - {{$book->title}}
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{route('books.update', $book->id)}}" enctype="multipart/form-data">  
    @csrf 
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Title" value="{{old('title') ?? $book->title}}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" rows="3" placeholder="Description">{{old('desc') ?? $book->desc}}</textarea>
  </div>

  <div class="form-group">
    <input type="file" class="form-control" id="inputGroupFile01" name="img">
  </div>  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>   
@endsection