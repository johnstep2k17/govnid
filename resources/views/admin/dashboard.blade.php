{{-- @extends('layouts.dashboard') --}}

{{-- NEW --}}
@extends('layouts.dashboard-sidebar')
@section('title','Admin Dashboard • Gov NID')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-primary text-white d-flex align-items-center">
    <h2 class="h5 mb-0">Admin Dashboard</h2>

    <form class="ms-auto d-flex" method="GET" action="{{ route('admin.dashboard') }}">
      <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control form-control-sm me-2"
             placeholder="Search name or email">
      <button class="btn btn-outline-light btn-sm">Search</button>
    </form>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th style="width:70px;">ID</th>
            <th style="width:70px;">Photo</th>
            <th style="min-width:180px;">Name</th>
            <th style="min-width:220px;">Email</th>
            <th style="width:100px;">Role</th>
            <th style="width:110px;">Status</th>
            <th style="width:140px;">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $u)
            <tr>
              <td class="text-muted">{{ $u->id }}</td>

              <td>
                @php
                  $ext = $u->photo ? strtolower(pathinfo($u->photo, PATHINFO_EXTENSION)) : '';
                  $isImage = in_array($ext, ['jpg','jpeg','png','gif','bmp','webp']);
                @endphp
                @if($u->photo && $isImage)
                  <img src="/uploads/{{ $u->photo }}"
                       alt="photo"
                       class="rounded border"
                       style="width:40px;height:40px;object-fit:cover;">
                @elseif($u->photo)
                  <a href="/uploads/{{ $u->photo }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                    📄 file
                  </a>
                @else
                  <span class="text-muted">—</span>
                @endif
              </td>

              <td>
                <div class="fw-semibold">{{ $u->name }}</div>
              </td>

              <td>
                <a href="mailto:{{ $u->email }}">{{ $u->email }}</a>
              </td>

              <td><span class="badge bg-secondary text-uppercase">{{ $u->role }}</span></td>

              <td>
                @if($u->trashed())   {{-- ✅ use the helper --}}
                  <span class="badge bg-danger">Deleted</span>
                @else
                  <span class="badge bg-success">Active</span>
                @endif
              </td>

              <td>
                @if($u->trashed())
                  <form action="{{ route('admin.users.restore', $u->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-success">Restore</button>
                  </form>
                @else
                  <form action="{{ route('admin.users.delete', $u->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-danger">Soft Delete</button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center py-4 text-muted">No users found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

{{-- ✅ Pagination controls aligned right --}}
<div class="card-footer">
  <div class="d-flex justify-content-end">
    {{ $users->links('pagination::bootstrap-5') }}
  </div>
</div>
</div>
  </div>
</div>
@endsection
