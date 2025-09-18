<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','Gov NID')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Local Bootstrap --}}
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  {{-- Local Bootstrap Icons --}}
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
<style>
  .layout-wrap { min-height: 100vh; }

  .sidebar {
    width: 240px;
    /* Light-to-soft-dark gradient */
    background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 50%, #dee2e6 100%);
    border-right: 1px solid #ced4da;
    position: sticky;
    top: 0;
    height: 100vh;
    padding: 1rem;
  }

  .sidebar .brand {
    font-weight: 700;
    font-size: 1.25rem;
    margin-bottom: 1.25rem;
    color: #212529;
  }

  .sidebar .nav-link {
    border-radius: .5rem;
    padding: .6rem .75rem;
    display: flex;
    align-items: center;
    gap: .5rem;
    font-weight: 500;
    color: #343a40;
    transition: background .2s, color .2s;
  }

  .sidebar .nav-link:hover {
    background: #ced4da;
    color: #000;
  }

  .sidebar .nav-link.active {
    background: #adb5bd;
    color: #fff;
  }

  .content {
    flex: 1;
    padding: 1.25rem;
    background: #f8f9fa;
  }
</style>

</head>
<body>

<div class="d-flex layout-wrap">
  {{-- LEFT SIDEBAR --}}
  <aside class="sidebar">
    <div class="brand">Gov NID</div>

    <nav class="nav flex-column mb-3">
      @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('admin.audit') }}"
           class="nav-link {{ request()->routeIs('admin.audit') ? 'active' : '' }}">
          <i class="bi bi-journal-text"></i>
          Audit Logs
        </a>

        <a href="{{ route('admin.users.create') }}"
           class="nav-link {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
          <i class="bi bi-person-plus"></i>
          Create User
        </a>
      @endif

      <a href="{{ route('logout') }}" class="nav-link">
        <i class="bi bi-box-arrow-right"></i>
        Logout
      </a>
    </nav>
  </aside>

  {{-- RIGHT CONTENT --}}
  <main class="content">
    @yield('content')
  </main>
</div>

@include('partials.footer')

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
