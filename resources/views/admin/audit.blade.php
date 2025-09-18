@extends('layouts.dashboard-sidebar')
@section('title','Audit Logs • Gov NID')

@section('content')
<div class="card shadow-sm border-0">
  <div class="card-header bg-light d-flex justify-content-between align-items-center">
    <h2 class="h5 mb-0 fw-bold text-dark">Audit Logs</h2>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">← Back to Admin</a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped table-hover mb-0">
        <thead class="table-secondary">
          <tr>
            <th>ID</th>
            <th>Actor (user_id)</th>
            <th>Action</th>
            <th>Details</th>
            <th>When</th>
          </tr>
        </thead>
        <tbody>
          @foreach($logs as $log)
          <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->user_id }}</td>
            <td><span class="badge bg-info text-dark">{{ $log->action }}</span></td>
            {{-- <td><code>{{ $log->details }}</code></td> --}}
            <td><code>{{ is_array($log->details) ? json_encode($log->details) : $log->details }}</code></td>
            <td>{{ $log->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
