<!DOCTYPE html>
<html>
<head>
  <title>Gov NID System</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    :root { --bg:#f6f6f6; --card:#fff; --text:#222; --muted:#666; --border:#ddd; }
    * { box-sizing: border-box; }
    body { font-family: Arial, Helvetica, sans-serif; margin:0; background:var(--bg); color:var(--text); }
    .nav { background:#111; color:#fff; padding:12px 18px; display:flex; gap:16px; align-items:center; }
    .nav a { color:#fff; text-decoration:none; margin-right:12px; }
    .wrap { max-width: 980px; margin: 24px auto; padding: 0 16px; }
    .card { background:var(--card); border:1px solid var(--border); border-radius:10px; padding:18px; box-shadow: 0 2px 6px rgba(0,0,0,.05); }
    .row { display:grid; grid-template-columns: 1fr; gap:16px; }
    table { width:100%; border-collapse: collapse; margin-top: 10px; background:#fff; }
    th, td { border:1px solid var(--border); padding:8px 10px; text-align:left; vertical-align: top; }
    .muted { color: var(--muted); font-size: 13px; }
    .btn { padding:8px 12px; border:1px solid #333; background:#111; color:#fff; border-radius:6px; cursor:pointer; }
    .btn.outline { background:#fff; color:#111; }
    input[type=text], input[type=email], input[type=password], input[type=file] { width:100%; padding:8px 10px; border:1px solid var(--border); border-radius:6px; }
    .grid-2 { display:grid; grid-template-columns: 1fr 1fr; gap:12px; }
    .flex { display:flex; gap:8px; align-items:center; flex-wrap: wrap; }
    .badge { padding:3px 8px; border-radius: 999px; border:1px solid var(--border); font-size:12px; }
    .badge.green { background:#eaffea; border-color:#7fd27f; }
    .badge.red { background:#ffecec; border-color:#f28b8b; }
    .thumb { width:54px; height:54px; object-fit:cover; border:1px solid var(--border); border-radius:6px; }
    .flash { margin:10px 0; padding:10px 12px; border-radius:6px; }
    .flash.ok { background:#e8ffe8; border:1px solid #8fd28f; }
    .flash.err { background:#ffe8e8; border:1px solid #d28f8f; }
  </style>
</head>
<body>
  @include('partials.nav')

  <div class="wrap">
    @include('partials.flash')
    @yield('content')
        <p class="muted" style="margin-top:24px; text-align:center;">
      Government National Identification System 2025
    </p>
  </div>
</body>
</html>
