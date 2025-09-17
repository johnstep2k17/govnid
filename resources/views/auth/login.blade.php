@extends('layouts.app')

@section('content')
<div class="card" style="max-width:460px;margin:auto">
  <h2>Login</h2>
  <form method="POST" action="/login">
    @csrf
    <label>Email</label>
    <input type="email" name="email" placeholder="Email">
    <br><br>
    <label>Password</label>
    <input type="password" name="password" placeholder="Password">
    <br><br>
    <button class="btn" type="submit">Login</button>
    <a class="btn outline" href="/register">Register</a>
  </form>
</div>
@endsection
