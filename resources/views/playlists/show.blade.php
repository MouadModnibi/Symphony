<x-master title="Playlist: {{ $playlist->name }}">
<div class="container mx-auto px-4 py-8 pb-20"> <!-- Added pb-20 to prevent content from being hidden under player -->
    <!-- Playlist Header with Cover -->
    <div class="flex flex-col md:flex-row gap-8 mb-8">
        <div class="md:w-1/3">
            <img src="{{ asset('storage/' . $playlist->cover) }}" 
                 alt="{{ $playlist->name }}" 
                 class="w-full rounded-lg shadow-lg">
        </div>
        
        <div class="md:w-2/3">
            <h1 class="text-3xl font-bold mb-4">{{ $playlist->name }}</h1>
            <p class="text-gray-600 mb-4">{{ $playlist->songs->count() }} songs</p>
            
            <!-- Add Song Form -->
            <form method="POST" action="{{ route('playlists.addSong', $playlist) }}" class="mb-6">
                @csrf
                <div class="flex flex-col md:flex-row gap-4">
                    <select name="song_id" required
                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Select a song to add</option>
                        @foreach ($songs as $song)
                            <option value="{{ $song->id }}">{{ $song->title }} - {{ $song->artist }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Add Song
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Songs List -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <h2 class="text-xl font-semibold p-4 bg-gray-50 border-b">Songs in this playlist</h2>
        
        @if ($playlist->songs->count() > 0)
            <ul class="divide-y divide-gray-200">
                @foreach ($playlist->songs as $song)
                    <li class="p-4 hover:bg-gray-50 flex justify-between items-center group">
                        <div class="flex items-center gap-4 flex-1 min-w-0 cursor-pointer" 
                             onclick="showBottomPlayer(
         '{{ $song->title }}',
         '{{ asset('storage/' . $song->file_path) }}',
         '{{ asset('storage/' . $song->cover_image) }}'
     )">
                            <div class="flex-shrink-0 w-10 h-10 bg-gray-200 rounded flex items-center justify-center group-hover:bg-gray-300 transition">
                                <img src="{{ asset('storage/' . $song->cover_image) }}" alt="" srcset="">
                            </div>
                            <div class="min-w-0">
                                <p class="font-medium truncate">{{ $song->title }}</p>
                                <p class="text-sm text-gray-500 truncate">{{ $song->artist }}</p>
                            </div>
                        </div>
                        
                        <form action="{{ route('playlists.removeSong', [$playlist->id, $song->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="event.stopPropagation(); return confirm('Remove this song from playlist?')"
                                    class="text-gray-400 hover:text-red-600 p-2 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="p-8 text-center text-gray-500">
                <p>No songs in this playlist yet.</p>
                <p class="mt-2">Add your first song using the form above.</p>
            </div>
        @endif
    </div>
</div>

<!-- Include the music player component -->
<x-musicplayer filePath="" title="" coverImage="" />

</x-master>

<script>
    function showBottomPlayer(title, filePath, coverImage = '') {
        if (typeof window.showBottomPlayer === 'function') {
            window.showBottomPlayer(title, filePath, coverImage);
        }
    }
</script>
