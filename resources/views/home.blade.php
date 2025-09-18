@extends('layouts.app')

@section('content')

  {{-- Banner (blank image area) --}}
  <div class="p-4 p-md-5 mb-4 rounded placeholder-banner d-flex align-items-center">
    <div class="col-md-8">
      <h1 class="display-5 fw-bold">Government National Identification System</h1>
      <p class="lead my-3">
        This version of the Government National Identification System (GNIDS) is intentionally designed with vulnerabilities as part of a cyber exercise. It allows participants to practice identifying, exploiting, and securing weaknesses in a critical government system.
      </p>
      <p class="lead mb-0">
        <a href="#about" class="text-primary fw-bold">Learn more…</a>
      </p>
    </div>
  </div>
  <div class="row g-5">

    {{-- Main posts list --}}
    <div class="col-md-8">

      <article class="mb-4 border-bottom pb-3">
        <h2 class="blog-post-title">About Us</h2>
        <p class="blog-post-meta text-muted">January 1, 2025 by Admin</p>
        <div class="placeholder-img mb-3"></div>
        <p>
The goal is not only to highlight the importance of cybersecurity in government infrastructures, but also to provide hands-on experience for cybersecurity professionals and students engaged in red team and blue team activities.
        </p>
      </article>

      <article class="mb-4 border-bottom pb-3">
        <h2 class="blog-post-title">Consectetur adipiscing elit</h2>
        <p class="blog-post-meta text-muted">January 3, 2025 by User</p>
        <div class="placeholder-img mb-3"></div>
        <p>
          Vestibulum id ligula porta felis euismod semper. Maecenas faucibus mollis interdum.
          Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.
        </p>
        <p>
          Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
        </p>
      </article>

      <article class="mb-4">
        <h2 class="blog-post-title">Praesent commodo cursus magna</h2>
        <p class="blog-post-meta text-muted">January 5, 2025 by Team</p>
        <div class="placeholder-img mb-3"></div>
        <p>
          Donec sed odio dui. Nullam id dolor id nibh ultricies vehicula ut id elit.
          Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus.
        </p>
        <p>
          Etiam porta sem malesuada magna mollis euismod. Aenean lacinia bibendum nulla sed consectetur.
        </p>
      </article>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary rounded-pill px-3" href="#">Older</a>
        <a class="btn btn-outline-secondary rounded-pill px-3 disabled" aria-disabled="true">Newer</a>
      </nav>
    </div>

    {{-- Sidebar --}}
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded" id="about">
          <h4 class="fst-italic">About Us</h4>
          <p class="mb-0">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas faucibus mollis interdum.
            Integer posuere erat a ante venenatis dapibus posuere velit aliquet.
          </p>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">January 2025</a></li>
            <li><a href="#">December 2024</a></li>
            <li><a href="#">November 2024</a></li>
            <li><a href="#">October 2024</a></li>
            <li><a href="#">September 2024</a></li>
          </ol>
        </div>

        <div class="p-4" id="contact">
          <h4 class="fst-italic">Contact Us</h4>
          <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <ul class="list-unstyled">
            <li>Email: <a href="mailto:info@govnid.local">info@govnid.local</a></li>
            <li>Phone: +63 900 123 4567</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

@endsection
