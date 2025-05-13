<nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #6f42c1;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/notification">Notification</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/settings">Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/songs">Songs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-light text-purple" href="{{ route('create') }}" style="background-color: #d63384; color: white !important;">Add Song</a>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="d-flex" action="{{ route('songs.search') }}" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search songs..." aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
