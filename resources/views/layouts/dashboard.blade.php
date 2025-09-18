<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Gov NID')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-light">

  {{-- ONE navbar only for all dashboards --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Gov NID</a>

      <div class="ms-auto d-flex gap-2">
        @if(auth()->check() && auth()->user()->role === 'admin')
          <a href="{{ route('admin.audit') }}" class="btn btn-outline-primary btn-sm">Audit Logs</a>
          <a href="{{ route('admin.users.create') }}" class="btn btn-outline-success btn-sm">Create User</a>
        @endif
        <a href="{{ route('logout') }}" class="btn btn-primary btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  <main class="container my-4">
    @yield('content')
  </main>

  @include('partials.footer')

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
