@extends('layouts.blank')
@section('title','Register • Gov NID')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="col-11 col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-primary text-white text-center">
        <h2 class="h5 mb-0 fw-bold">Register</h2>
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
          @csrf

          <div class="row g-3">
            <!-- Column 1 -->
            <div class="col-md-6">
              <div class="mb-2">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Full name">
              </div>

              <div class="mb-2">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control form-control-sm" placeholder="Email">
              </div>

              <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-sm" placeholder="Password">
              </div>

              <div class="mb-2">
                <label class="form-label">National ID</label>
                <input type="text" name="national_id" class="form-control form-control-sm" placeholder="e.g. NID-2025-001234">
              </div>

              <div class="mb-2">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control form-control-sm" rows="2" placeholder="Street, City, Province, Zip"></textarea>
              </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-6">
              <div class="mb-2">
                <label class="form-label">Birthday</label>
                <input type="date" name="birthday" class="form-control form-control-sm">
              </div>

              <div class="mb-2">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control form-control-sm" placeholder="+63 9xx xxx xxxx">
              </div>

              <div class="mb-2">
                <label class="form-label">Blood Type</label>
                <select name="blood_type" class="form-select form-select-sm">
                  <option value="">-- select --</option>
                  <option>A+</option><option>A-</option>
                  <option>B+</option><option>B-</option>
                  <option>O+</option><option>O-</option>
                  <option>AB+</option><option>AB-</option>
                </select>
              </div>

              <div class="mb-2">
                <label class="form-label">Emergency Contact</label>
                <input type="text" name="emergency_contact" class="form-control form-control-sm" placeholder="Name / Phone">
              </div>

              <div class="mb-3">
                <label class="form-label">Photo (any file allowed)</label>
                <input type="file" name="photo" class="form-control form-control-sm">
              </div>
            </div>
          </div>

<div class="d-grid gap-2 mt-3">
  <button type="submit" class="btn btn-success btn-lg">Create Account</button>
  <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Back to Login</a>
</div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
