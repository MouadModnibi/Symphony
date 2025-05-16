<div class="w-48 rounded-lg bg-gray-800 hover:bg-gray-700 transition-all duration-200 shadow-lg group relative overflow-hidden">
    <!-- Album Art with Play Button Overlay -->
    <div class="relative">
        <img 
            src="{{ asset('storage/' . $song->cover_image) }}" 
            alt="{{ $song->title }}"
            class="w-full h-48 object-cover rounded-t-lg"
        >
        
        <!-- Play Button (appears on hover) -->
        <button 
            onclick="showBottomPlayer('{{ $song->title }}', '{{ asset('storage/' . $song->file_path) }}')"
            class="absolute bottom-2 right-2 bg-green-500 hover:bg-green-400 text-white rounded-full p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200 shadow-lg transform translate-y-2 group-hover:translate-y-0"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <!-- Song Info -->
    <div class="p-3">
        <h3 class="text-white font-semibold truncate">{{ $song->title }}</h3>
        <p class="text-gray-400 text-sm truncate">{{ $song->genre }}</p>
        
        <!-- Admin Controls (appear on hover) -->
        @auth
            @if(auth()->user()->type === 'artist' || auth()->user()->type === 'admin')
                <div class="flex justify-end space-x-2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    <a 
                        href="{{ route('songs.edit', $song->id) }}" 
                        class="text-blue-400 hover:text-blue-300 p-1"
                        title="Edit"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    
                    <form action="{{ route('songs.destroy', $song->id) }}" method="post" class="inline">
                        @method('DELETE')
                        @csrf
                        <button 
                            type="submit" 
                            class="text-red-400 hover:text-red-300 p-1"
                            title="Delete"
                            onclick="return confirm('Are you sure you want to delete this song?')"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
</div>