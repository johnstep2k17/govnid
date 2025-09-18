<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gov NID — Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Local Bootstrap --}}
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-light">

  {{-- Auth Navbar: brand on left, Login on right --}}
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand fw-semibold" href="{{ route('home') }}">Gov NID</a>
      <div class="ms-auto">
        <a class="btn btn-sm btn-primary" href="{{ route('login') }}">Login</a>
      </div>
    </div>
  </nav>

  <main class="container py-5">
    @yield('content')
  </main>
  
  @include('partials.footer')   {{-- ✅ bagong footer partial --}}

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
