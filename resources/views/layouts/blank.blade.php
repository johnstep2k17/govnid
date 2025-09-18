<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Gov NID')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Local Bootstrap --}}
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>
<body class="bg-light">
  @yield('content')

  @include('partials.footer')   {{-- ✅ unified footer --}}

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
