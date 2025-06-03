<x-master title="Mes playlists">

<div class="container mx-auto px-4 py-8">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">Mes playlists</h1>

    <!-- Formulaire création playlist -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <form method="POST" action="{{ route('playlists.store') }}">
            @csrf
            <div class="flex space-x-4">
                <input type="text" name="name" placeholder="Nom de la playlist" required
                       class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Créer
                </button>
            </div>
        </form>
    </div>

    <!-- Liste des playlists -->
    @foreach ($playlists as $playlist)
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $playlist->name }}</h3>
            <ul class="mb-4 list-disc list-inside text-gray-700">
                @forelse ($playlist->songs as $song)
                    <li>{{ $song->title }}</li>
                @empty
                    <li class="italic text-gray-400">Aucune chanson</li>
                @endforelse
            </ul>

            <!-- Formulaire ajout musique -->
            <form method="POST" action="{{ route('playlists.addSong', $playlist) }}">
                @csrf
                <div class="flex space-x-4">
                    <select name="song_id"
                            class="w-full border border-gray-300 px-4 py-2 rounded">
                        @foreach ($songs as $song)
                            <option value="{{ $song->id }}">{{ $song->title }}</option>
                        @endforeach
                    </select>
                    <button type="submit"
                            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    @endforeach

</div>

</x-master>
