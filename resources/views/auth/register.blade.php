@extends('layout')

@section('title')
Register
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{ route('auth.handleRegister') }}">  
    @csrf 
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Title</label>
    <input type="password" name="pass" class="form-control" placeholder="Password" value="{{ old('pass') }}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>   
@endsection