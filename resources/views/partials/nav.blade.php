<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicApp</title>
    <!-- Required Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom CSS for logo sizing */
        .navbar-brand-img {
            height: 40px; /* Fixed height */
            width: auto; /* Maintain aspect ratio */
            max-width: 150px; /* Maximum width */
            object-fit: contain; /* Ensure image fits properly */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: linear-gradient(135deg, #6f42c1 0%, #5a2d9e 100%);">
        <div class="container">
            <!-- Logo with proper sizing -->
            <a class="navbar-brand p-0 me-3" href="/">
                <img src="{{ asset('storage/logo.png') }}" alt="Logo"  width="80px">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded" href="/"><i class="fas fa-home me-1"></i> Home</a>
                    </li>
                    @auth
                        
                    
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded" href="/notification"><i class="fas fa-bell me-1"></i> Notifications</a>
                    </li>
                    @endauth
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded" href="/songs"><i class="fas fa-music me-1"></i> Songs</a>
                    </li>
                    
                    @guest
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded" href="{{ route('register') }}"><i class="fas fa-user-plus me-1"></i> Register</a>
                    </li>
                    @endguest
                    
                    @auth
                        @if(auth()->user()->type === 'artist' || auth()->user()->type === 'admin')
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 rounded text-white" href="{{ route('create') }}" style="background-color: #d63384;">
                                <i class="fas fa-plus-circle me-1"></i> Add Song
                            </a>
                        </li>
                        @endif
                    
                    
                    <li class="nav-item mx-1">
                        <a class="nav-link px-3 py-2 rounded text-white" href="#" style="background-color: #d63384;">
                            <i class="fas fa-list me-1"></i> Add Playlist
                        </a>
                    </li>
                </ul>
                @endauth
                <!-- Search Form -->
                <form class="d-flex ms-auto me-3" action="{{ route('songs.search') }}" method="GET">
                    <div class="input-group">
                        <input class="form-control border-0 py-2 px-3 rounded-start" type="search" name="query" placeholder="Search songs..." aria-label="Search">
                        <button class="btn btn-light text-purple border-0 rounded-end" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                
                @auth
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('storage/' . auth()->user()->pfp) }}" alt="Profile" width="32" height="32" class="rounded-circle me-2">
                        <span class="d-none d-lg-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item" href="{{route('user.show',auth()->user()->id)}}"><i class="fas fa-user me-2"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('user.settings',auth()->user()->id)}}"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Required Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>