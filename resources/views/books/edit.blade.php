@extends('layout')

@section('title')
Edit book - {{$book->title}}
@endsection

@section('content')

<form method="POST" action="{{route('books.update', $book->id)}}">  
    @csrf 
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" placeholder="Title" value="{{$book->title}}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" rows="3" placeholder="Description">{{$book->desc}}</textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>   
@endsection