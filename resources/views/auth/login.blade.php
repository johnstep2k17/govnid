@extends('layouts.blank')
@section('title','Login • Gov NID')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="col-11 col-sm-8 col-md-6 col-lg-4">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0 text-center">
        
        {{-- ✅ Logo only, no "Login" word --}}
        <img src="{{ asset('images/govnid_logo.png') }}" 
             alt="Gov NID Logo" 
             class="mb-2" 
             style="max-width: 200px; height: auto;">

      </div>

      <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
          <a href="{{ route('register') }}" class="btn btn-success w-100">Register</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
