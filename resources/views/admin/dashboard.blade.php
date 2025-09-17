@extends('layouts.app')

@section('content')
<div class="card">
  <div class="flex" style="justify-content:space-between">
    <h2>Admin Dashboard</h2>
    <a class="btn outline" href="/admin/users/create">Create User</a>
  </div>

  <div class="flex" style="gap:16px;margin:10px 0">
    <form method="GET" action="/admin/dashboard" class="flex">
      <input type="text" name="q" placeholder="(optional) search by name/email">
      <button class="btn outline" type="submit">Search</button>
    </form>
    {{-- <span class="muted">No validation; simple Eloquent filter only.</span> --}}
  </div>

  <table>
    <tr>
      <th>ID</th><th>Photo</th><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Action</th>
    </tr>
    @foreach($users as $u)
      <tr>
        <td>{{ $u->id }}</td>
        <td>
          @if($u->photo)
            <img class="thumb" src="/uploads/{{ $u->photo }}">
          @endif
        </td>
        <td>{{ $u->name }}</td>
        <td>{{ $u->email }}</td>
        <td><span class="badge">{{ $u->role }}</span></td>
        <td>
          @if($u->deleted_at)
            <span class="badge red">Deleted</span>
          @else
            <span class="badge green">Active</span>
          @endif
        </td>
        <td class="flex">
          @if(!$u->deleted_at)
            <form method="POST" action="/admin/delete/{{ $u->id }}">@csrf<button class="btn" type="submit">Soft Delete</button></form>
          @else
            <form method="POST" action="/admin/restore/{{ $u->id }}">@csrf<button class="btn outline" type="submit">Restore</button></form>
          @endif
        </td>
      </tr>
    @endforeach
  </table>
</div>
@endsection
