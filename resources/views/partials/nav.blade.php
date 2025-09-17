<div class="nav">
  <a href="/">Gov NID</a>
  @auth
    @if(auth()->user()->role === 'admin')
      <a href="/admin/dashboard">Admin</a>
      <a href="/admin/users/create">Create User</a>
      <a href="/admin/audit">Audit Logs</a>   <!-- 🔽 NEW link -->
    @else
      <a href="/user/dashboard">Dashboard</a>
    @endif
    <span class="muted">| {{ auth()->user()->name }}</span>
    <a href="/logout" style="margin-left:auto">Logout</a>
  @else
    <a href="/" style="margin-left:auto">Login</a>
    <a href="/register">Register</a>
  @endauth
</div>
