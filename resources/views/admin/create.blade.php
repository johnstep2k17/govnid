@extends('layouts.app')

@section('content')
<div class="card" style="max-width:680px;margin:auto">
  <h2>Create User (Admin)</h2>
  <form method="POST" action="/admin/users" enctype="multipart/form-data">
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
        <label>Role</label>
        <input type="text" name="role" placeholder="admin or user" value="user">
      </div>
    </div>
    <br>
    <label>Photo (any file allowed)</label>
    <input type="file" name="photo">
    <br><br>
    <button class="btn" type="submit">Save</button>
  </form>
</div>
@endsection
