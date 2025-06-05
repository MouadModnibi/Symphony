<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicApp</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out forwards;
        }
        .nav-gradient {
            background: linear-gradient(135deg, #e0f2fe 0%, #7dd3fc 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="nav-gradient shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and mobile menu button -->
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 flex items-center">
                        <img src="{{ asset('storage/logo.png') }}" alt="Logo" class="h-20 w-auto">
                    </a>
                    
                    <!-- Desktop menu -->
                    <div class="hidden md:ml-6 md:flex md:items-center md:space-x-1">
                        <a href="/" class="text-blue-900 hover:bg-blue-200/50 px-3 py-2 rounded-md text-sm font-medium flex items-center transition-colors duration-200">
                            <i class="fas fa-home mr-2"></i> Home
                        </a>
                        
                        
                        
                        <a href="/songs" class="text-blue-900 hover:bg-blue-200/50 px-3 py-2 rounded-md text-sm font-medium flex items-center transition-colors duration-200">
                            <i class="fas fa-music mr-2"></i> Songs
                        </a>
                    </div>
                </div>
                
                <!-- Search and user section -->
                <div class="flex items-center">
                    <!-- Search form -->
                    <form action="{{ route('songs.search') }}" method="GET" class="hidden md:block mr-4">
                        <div class="relative">
                            <input type="search" name="query" placeholder="Search songs..." 
                                class="py-1.5 px-4 pr-10 rounded-full text-sm bg-blue-100/70 text-blue-900 placeholder-blue-600/70 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-blue-100 w-64 transition-all duration-200">
                            <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-blue-600 hover:text-blue-800">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <!-- Auth links -->
                    <div class="flex items-center space-x-2">
                        @guest
                        <a href="{{ route('login') }}" class="text-blue-900 hover:bg-blue-200/50 px-3 py-1.5 rounded-md text-sm font-medium flex items-center transition-colors duration-200">
                            <i class="fas fa-sign-in-alt mr-1"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-3 py-1.5 rounded-md text-sm font-medium flex items-center transition-colors duration-200">
                            <i class="fas fa-user-plus mr-1"></i> Register
                        </a>
                        @endguest

                        @auth
                            @if(auth()->user()->type === 'artist' || auth()->user()->type === 'admin')
                            <a href="{{ route('create') }}" class="bg-blue-600 text-white hover:bg-blue-700 px-3 py-1.5 rounded-md text-sm font-medium flex items-center transition-colors duration-200 mr-2">
                                <i class="fas fa-plus-circle mr-1"></i> Add Song
                            </a>
                            @endif
                            
                            <!-- In your navbar (replace the existing playlist link) -->
<a href="{{ route('playlists.index') }}" 
   class="relative flex items-center px-3 py-1.5 text-sm font-medium rounded-md transition-all duration-200 group"
   style="background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);">
   
   <!-- Small music icon with animation -->
   <span class="mr-2 relative">
      <i class="fas fa-music text-xs text-white"></i>
      <span class="absolute -right-1 -top-1 h-1.5 w-1.5 bg-pink-300 rounded-full opacity-0 group-hover:opacity-100 animate-pulse"></span>
   </span>
   
   <!-- Text -->
   <span class="text-white">Playlists</span>
   
   <!-- Hover effect underline -->
   <span class="absolute bottom-0 left-0 h-0.5 bg-white w-0 group-hover:w-full transition-all duration-300"></span>
</a>

                           <a href="{{route('premium')}}" class="relative group bg-gradient-to-r from-purple-600 to-blue-500 text-white hover:from-purple-700 hover:to-blue-600 px-4 py-1.5 rounded-md text-sm font-medium flex items-center transition-all duration-200 shadow-lg hover:shadow-xl">
    <i class="fas fa-crown mr-2 text-yellow-300"></i> 
    <span>Explore Premium</span>
    
    <!-- Optional: Sparkle effect on hover -->
    <span class="absolute -top-1 -right-1 h-2 w-2 rounded-full bg-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
    <span class="absolute -top-1 -right-3 h-2 w-2 rounded-full bg-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
    <span class="absolute -top-3 -right-2 h-2 w-2 rounded-full bg-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></span>
</a>
                            <!-- User dropdown -->
                            <div class="relative ml-2" x-data="{ open: false }">
                                <button @click= "open = !open" class="flex items-center space-x-1 focus:outline-none">
                                    <img src="{{ asset('storage/' . auth()->user()->pfp) }}" alt="Profile" class="h-8 w-8 rounded-full border-2 border-blue-300">
                                    <span class="hidden md:inline text-blue-900 text-sm font-medium">{{ auth()->user()->name }}</span>
                                    <i class="fas fa-chevron-down text-blue-900 text-xs ml-1 transition-transform duration-200" :class="{'transform rotate-180': open}"></i>
                                </button>

                                <!-- Dropdown menu -->
                                <div x-show="open" @click.away="open = false" 
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 z-50 animate-fadeIn">
                                    <a href="{{route('user.show',auth()->user()->id)}}" class="block px-4 py-2 text-sm text-blue-800 hover:bg-blue-100">
                                        <i class="fas fa-user mr-2 text-blue-600"></i> My Profile
                                    </a>
                                    <a href="{{route('user.settings',auth()->user()->id)}}" class="block px-4 py-2 text-sm text-blue-800 hover:bg-blue-100">
                                        <i class="fas fa-cog mr-2 text-blue-600"></i> Settings
                                    </a>
                                    <div class="border-t border-gray-200 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center ml-2">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-blue-800 hover:text-blue-900 hover:bg-blue-200/50 focus:outline-none transition duration-150 ease-in-out" 
                            aria-label="Main menu" @click="mobileMenuOpen = !mobileMenuOpen">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-blue-100/80">
                <form action="{{ route('songs.search') }}" method="GET" class="px-2 mb-2">
                    <div class="relative">
                        <input type="search" name="query" placeholder="Search songs..." 
                            class="block w-full py-2 px-4 pr-10 rounded-full text-sm bg-white text-blue-900 placeholder-blue-600/70 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:bg-blue-50 border border-blue-200">
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-blue-600 hover:text-blue-800">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                
                <a href="/" class="block px-3 py-2 rounded-md text-base font-medium text-blue-900 hover:bg-blue-200/50 flex items-center">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                
                @auth
                <a href="/notification" class="block px-3 py-2 rounded-md text-base font-medium text-blue-900 hover:bg-blue-200/50 flex items-center">
                    <i class="fas fa-bell mr-2"></i> Notifications
                </a>
                @endauth
                
                <a href="/songs" class="block px-3 py-2 rounded-md text-base font-medium text-blue-900 hover:bg-blue-200/50 flex items-center">
                    <i class="fas fa-music mr-2"></i> Songs
                </a>
                
                @auth
                    @if(auth()->user()->type === 'artist' || auth()->user()->type === 'admin')
                    <a href="{{ route('create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700 flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i> Add Song
                    </a>
                    @endif
                    
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700 flex items-center">
                        <i class="fas fa-list mr-2"></i> Playlist
                    </a>
                @endauth
                
                @guest
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-blue-900 hover:bg-blue-200/50 flex items-center">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700 flex items-center">
                    <i class="fas fa-user-plus mr-2"></i> Register
                </a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>