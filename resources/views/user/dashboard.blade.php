@extends('layouts.app')

@section('content')
<div class="row">
  <div class="card">
    <h2>User Dashboard</h2>
    <div class="flex">
      @if($user->photo)
        <img class="thumb" src="/uploads/{{ $user->photo }}" alt="photo">
      @endif
      <div>
        <div><strong>{{ $user->name }}</strong></div>
        <div class="muted">{{ $user->email }}</div>
        <div class="badge green">role: user</div>
      </div>
    </div>
    <hr>
    <h3>Update Profile</h3>
    <form method="POST" action="/user/profile" enctype="multipart/form-data">
      @csrf
      <div class="grid-2">
        <div>
          <label>Name</label>
          <input type="text" name="name" value="{{ $user->name }}">
        </div>
        <div>
          <label>Email</label>
          <input type="email" name="email" value="{{ $user->email }}">
        </div>
      </div>
      <br>
      <div class="grid-2">
        <div>
          <label>New Password (optional)</label>
          <input type="password" name="password" placeholder="New Password (optional)">
        </div>
        <div>
          <label>Photo (any file allowed)</label>
          <input type="file" name="photo">
        </div>
      </div>
      <br>
      <button class="btn" type="submit">Save</button>
    </form>
    @if($user->photo)
      <p class="muted" style="margin-top:10px">Uploaded: <a href="/uploads/{{ $user->photo }}" target="_blank">{{ $user->photo }}</a></p>
    @endif
  </div>
</div>
@endsection
