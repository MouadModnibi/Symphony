<x-master title="Playlist: {{ $playlist->name }}">
<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold mb-6">{{ $playlist->name }}</h1>

    <img src="{{ asset('storage/' . $playlist->cover) }}" alt="{{ $playlist->name }}" class="w-full max-w-md h-64 object-cover rounded-lg mb-6">



    <!-- Liste des chansons -->
    <div>
        <h2 class="text-xl font-semibold mb-4">Songs in this playlist:</h2>
        @if ($playlist->songs->count() > 0)
            <ul class="space-y-2">
                @foreach ($playlist->songs as $song)
                    <li class="bg-white p-3 rounded shadow flex justify-between items-center">
                        <div>
                            <strong>{{ $song->title }}</strong> by {{ $song->artist }}
                        </div>
                        <!-- Optionnel: bouton supprimer chanson -->
                        <form action="{{ route('songs.destroy', [$playlist, $song]) }}" method="POST" onsubmit="return confirm('Delete this song?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No songs in this playlist yet.</p>
        @endif
    </div>

</div>
<form method="POST" action="{{ route('playlists.addSong', $playlist) }}" class="bg-white p-4 rounded-lg shadow mt-6">
    @csrf
    <div class="flex flex-col md:flex-row items-center gap-4">

        {{-- Select des chansons --}}
        <select name="song_id" required
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="" disabled selected>Choose a song</option>
            @foreach ($songs as $song)
                <option value="{{ $song->id }}">{{ $song->title }}</option>
            @endforeach
        </select>

        {{-- Bouton d'ajout --}}
        <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            Add Song
        </button>
    </div>
</form>
<form method="POST" action="{{ route('playlists.removeSong', [$playlist->id, $song->id]) }}">
    @csrf
    @method('DELETE')
    <button class="text-red-600">Delete</button>
</form>


</x-master>
