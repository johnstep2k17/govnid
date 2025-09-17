@extends('layouts.app')

@section('content')
<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Audit Logs</h2>
    <a class="btn outline" href="/admin/dashboard">Back to Admin</a>
  </div>
  <table>
    <tr>
      <th>ID</th>
      <th>Actor (user_id)</th>
      <th>Action</th>
      <th>Details (JSON)</th>
      <th>When</th>
    </tr>
    @foreach($logs as $log)
      <tr>
        <td>{{ $log->id }}</td>
        <td>{{ $log->user_id }}</td>
        <td>{{ $log->action }}</td>
        <td><pre style="white-space:pre-wrap;margin:0">{{ $log->details }}</pre></td>
        <td>{{ $log->created_at }}</td>
      </tr>
    @endforeach
  </table>
</div>
@endsection
