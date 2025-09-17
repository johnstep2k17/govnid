@extends('layouts.app')

@section('content')
<div class="card" style="max-width:560px;margin:auto">
  <h2>Register (User)</h2>
  <form method="POST" action="/register" enctype="multipart/form-data">
    @csrf
    <div class="grid-2">
      <div>
        <label>Name</label>
        <input type="text" name="name" placeholder="Full name">
      </div>
      <div>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email">
      </div>
    </div>
    <br>
    <div class="grid-2">
      <div>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
      </div>
      <div>
        <label>Photo (any file allowed)</label>
        <input type="file" name="photo">
      </div>
    </div>
    <br>
    <button class="btn" type="submit">Create account</button>
  </form>
</div>
@endsection
