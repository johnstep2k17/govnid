@extends('layouts.dashboard-sidebar')
@section('title','Create User • Gov NID')

@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-lg-10 col-xl-9">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="h5 mb-0 fw-bold">Create User (Admin)</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            {{-- Left column --}}
            <div class="col-md-6">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Full name">

              <div class="mt-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
              </div>

              <div class="mt-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>

              <div class="mt-3">
                <label class="form-label">National ID</label>
                <input type="text" name="national_id" class="form-control" placeholder="e.g. NID-2025-001234">
              </div>

              <div class="mt-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="2" placeholder="Street, City, Province, Zip"></textarea>
              </div>
            </div>

            {{-- Right column --}}
            <div class="col-md-6">
              <label class="form-label">Role</label>
              <select name="role" class="form-select">
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
              </select>

              <div class="mt-3">
                <label class="form-label">Birthday</label>
                <input type="date" name="birthday" class="form-control">
              </div>

              <div class="mt-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="+63 9xx xxx xxxx">
              </div>

              <div class="mt-3">
                <label class="form-label">Blood Type</label>
                <select name="blood_type" class="form-select">
                  <option value="">-- select --</option>
                  <option>A+</option><option>A-</option>
                  <option>B+</option><option>B-</option>
                  <option>O+</option><option>O-</option>
                  <option>AB+</option><option>AB-</option>
                </select>
              </div>

              <div class="mt-3">
                <label class="form-label">Emergency Contact</label>
                <input type="text" name="emergency_contact" class="form-control" placeholder="Contact Person / +63 900 111 2222">
              </div>

              <div class="mt-3">
                <label class="form-label">Photo (any file allowed)</label>
                <input type="file" name="photo" class="form-control">
              </div>
            </div>
          </div>

          <div class="d-grid d-sm-flex gap-2 mt-4">
<button class="btn btn-primary">Save</button>
<a href="{{ route('admin.dashboard') }}" class="btn btn-success">Back to Dashboard</a>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
