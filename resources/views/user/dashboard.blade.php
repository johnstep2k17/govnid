@extends('layouts.dashboard')


@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-lg-10">
    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white">
        <h2 class="h5 mb-0">User Dashboard</h2>
      </div>
      <div class="card-body">
        <div class="mb-3 d-flex align-items-center gap-3">
          @if($user->photo)
            <img src="/uploads/{{ $user->photo }}" alt="photo" class="rounded border" style="width:64px;height:64px;object-fit:cover;">
          @endif
          <div>
            <div class="fw-bold">{{ $user->name }}</div>
            <div class="text-muted">{{ $user->email }}</div>
          </div>

        </div>

        @if(session('msg'))
          <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <form method="POST" action="{{ url('/user/profile') }}" enctype="multipart/form-data">
          @csrf

          <div class="row g-4">
            <!-- Basic account -->
            <div class="col-12 col-md-6">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
              </div>
              <div class="mb-3">
                <label class="form-label">New Password (optional)</label>
                <input type="password" name="password" class="form-control" placeholder="New Password">
              </div>
              <div class="mb-3">
                <label class="form-label">Photo (any file allowed)</label>
                <input type="file" name="photo" class="form-control">

                {{-- @if($user->photo)
                  <small class="text-muted d-block mt-1">
                    Current: <a href="/uploads/{{ $user->photo }}" target="_blank">{{ $user->photo }}</a>
                  </small>
                @endif --}}

@if($user->photo)
  <div class="mt-2">
    <label class="form-label d-block">Current Photo</label>
    <img src="/uploads/{{ $user->photo }}" alt="Current Photo" 
         class="rounded border" style="width:80px; height:80px; object-fit:cover;">
  </div>
@endif


              </div>
            </div>

            <!-- Citizen profile (YOUR SNIPPET GOES HERE) -->
            <div class="col-12 col-md-6">
              <div class="mb-3">
                <label class="form-label">National ID</label>
                <input type="text" name="national_id" class="form-control" value="{{ $user->national_id }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="2">{{ $user->address }}</textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Birthday</label>
                <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
              </div>

              <div class="mb-3">
                <label class="form-label">Blood Type</label>
                <select name="blood_type" class="form-select">
                  @php $bt = $user->blood_type ?? ''; @endphp
                  <option value="" {{ $bt==''?'selected':'' }}></option>
                  @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $opt)
                    <option {{ $bt==$opt?'selected':'' }}>{{ $opt }}</option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Emergency Contact</label>
                <input type="text" name="emergency_contact" class="form-control" value="{{ $user->emergency_contact }}">
              </div>
            </div>
          </div>

<div class="d-grid d-sm-flex gap-2 mt-2">
  <button class="btn btn-primary">Save Changes</button>
  <a class="btn btn-success" href="{{ route('home') }}">Back to Home</a>
</div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
