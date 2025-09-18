
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gov NID Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- Local Bootstrap --}}
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <style>
    /* Minimal styles inspired by the Bootstrap blog example */
    .blog-header { line-height: 1; border-bottom: 1px solid #dee2e6; }
    .blog-header-logo { font-size: 2rem; text-decoration: none; }
    .nav-scroller { position: relative; z-index: 2; height: 2.75rem; overflow-y: hidden; }
    .nav-scroller .nav { display: flex; flex-wrap: nowrap; padding-bottom: 1rem; margin-top: -1px; overflow-x: auto; white-space: nowrap; -webkit-overflow-scrolling: touch; }
    .placeholder-banner { background: #e9ecef; border-radius: .5rem; height: 300px; }
    .placeholder-img { background: #e9ecef; border-radius: .25rem; width: 100%; height: 200px; }
    .blog-footer { padding: 2.5rem 0; color: #727272; text-align: center; border-top: 1px solid #e5e5e5; margin-top: 3rem; }
    .blog-footer a { color: inherit; text-decoration: underline; }
  </style>
</head>
<body>

  {{-- Top Navbar --}}
  <header class="blog-header py-3">
    <div class="container">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="blog-header-logo text-dark" href="{{ route('home') }}">Gov NID</a>
        </div>

        {{-- Center (left links as requested) --}}
        <div class="col-4 d-flex justify-content-center">
          <nav class="nav nav-masthead">
            <a class="nav-link px-2 link-secondary" href="{{ route('home') }}">Home</a>
            <a class="nav-link px-2 link-secondary" href="#about">About Us</a>
            <a class="nav-link px-2 link-secondary" href="#contact">Contact Us</a>
          </nav>
        </div>

        {{-- Right: search + register/login --}}
        <div class="col-4 d-flex justify-content-end align-items-center">
          <form class="d-flex me-2" role="search" action="#" method="GET">
            <input class="form-control form-control-sm" name="q" type="search" placeholder="Search" aria-label="Search">
          </form>
          <a class="btn btn-sm btn-outline-secondary me-1" href="/register">Register</a>
          <a class="btn btn-sm btn-primary" href="/login">Login</a>
        </div>
      </div>
    </div>
  </header>

  <main class="container my-4">
    @yield('content')
  </main>

  {{-- <footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> &middot; Adapted for Gov NID Exercise</p>
    <p><a href="#">Back to top</a></p>
  </footer> --}}

   @include('partials.footer')   {{-- ✅ unified footer --}}

  {{-- Local Bootstrap --}}
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
