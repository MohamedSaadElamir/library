@extends('layout')

@section('title')
Login
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{ route('auth.handleLogin') }}">  
    @csrf 
  
  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>   
@endsection