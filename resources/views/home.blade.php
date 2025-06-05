<x-master title="MusicHub - Découvrez votre prochain son préféré">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-b from-purple-900 to-gray-900 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-4 py-24 md:py-32">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Your unlimited musical universe</h1>
                <p class="text-xl md:text-2xl mb-8">Discover, listen to, and share millions of tracks created by artists from around the world.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a  href="{{ url('/start-trial') }}" class="px-8 py-3 bg-purple-600 hover:bg-purple-700 rounded-full font-medium transition duration-300 transform hover:scale-105">
                          Start your free trial
                    </a>
                    <a href="/songs" class="px-8 py-3 bg-white bg-opacity-10 hover:bg-opacity-20 rounded-full font-medium transition duration-300 border border-white border-opacity-30">
                       Discover music
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Playlists -->
    <div class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">Trending playlists</h2>
                <a href="/playlists" class="text-purple-600 hover:underline flex items-center">
                    Voir tout
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <!-- Playlist Card 1 -->
                <a href="/playlist/1" class="group">
                    <div class="relative overflow-hidden rounded-lg aspect-square mb-3">
                        <img src="https://source.unsplash.com/random/300x300/?music,playlist,1" alt="Playlist" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition duration-300"></div>
                        <button class="absolute bottom-3 right-3 w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="font-medium text-gray-900 group-hover:text-purple-600 transition">Top Hits 2023</h3>
                    <p class="text-sm text-gray-500">50 titres • 3h42</p>
                </a>
                
                <!-- Playlist Card 2 -->
                <a href="/playlist/2" class="group">
                    <div class="relative overflow-hidden rounded-lg aspect-square mb-3">
                        <img src="https://source.unsplash.com/random/300x300/?music,playlist,2" alt="Playlist" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-30 transition duration-300"></div>
                        <button class="absolute bottom-3 right-3 w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="font-medium text-gray-900 group-hover:text-purple-600 transition">Chill Vibes</h3>
                    <p class="text-sm text-gray-500">35 titres • 2h15</p>
                </a>
                
                <!-- Add 4 more playlist cards similarly -->
            </div>
        </div>
    </div>

    
                
                <!-- Add 2 more album cards similarly -->
            </div>
        </div>
    </div>

    <!-- Features -->
    <div class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Why choose Symphony?</h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">An unparalleled musical experience designed for true enthusiasts.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="text-center p-6 bg-gray-800 rounded-xl hover:bg-gray-700 transition duration-300">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">More than 70 million songs</h3>
                    <p class="text-gray-300">Access one of the largest music catalogs in the world..</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="text-center p-6 bg-gray-800 rounded-xl hover:bg-gray-700 transition duration-300">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Offline listening</h3>
                    <p class="text-gray-300">Download your favorite tracks and listen offline</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="text-center p-6 bg-gray-800 rounded-xl hover:bg-gray-700 transition duration-300">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Qualité audio premium</h3>
                    <p class="text-gray-300">Enjoy high-quality sound with no ads interrupting your music.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="py-16 bg-purple-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to experience Symphony?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">Try it free for 30 days. Cancel anytime..</p>
            <a href="/signup" class="inline-block px-8 py-3 bg-white text-purple-600 rounded-full font-bold hover:bg-gray-100 transition duration-300 transform hover:scale-105">
              Launch your free trial
            </a>
        </div>
    </div>
</x-master>