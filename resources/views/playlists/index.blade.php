<x-master title="My Playlists">
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">My Playlists</h1>

    <!-- Create Playlist Form -->
   <form method="POST" action="{{ route('playlists.store') }}" enctype="multipart/form-data" class="mb-8 bg-white p-4 rounded-lg shadow">
    @csrf
    <div class="flex flex-col md:flex-row gap-4 items-center">

        {{-- Champ pour le nom de la playlist --}}
        <input 
            type="text" 
            name="name" 
            placeholder="Playlist name" 
            required 
            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        >

        {{-- Champ input de fichier (caché) --}}
        <input 
            type="file" 
            name="cover" 
            id="coverInput" 
            accept="image/*" 
            class="hidden" 
            onchange="previewImage(event)"
        >

        {{-- Label personnalisé pour le bouton de fichier --}}
        <label 
            for="coverInput" 
            class="cursor-pointer bg-gray-100 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-200 text-center"
        >
            Choose a file
        </label>

        {{-- Bouton de création --}}
        <button 
            type="submit" 
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg"
        >
            Create
        </button>
    </div>

    {{-- Preview de l'image --}}
    <div class="mt-4">
        <img id="imagePreview" src="#" alt="Image preview" class="hidden w-32 h-32 object-cover rounded border">
    </div>
</form>


    <!-- Playlist List -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($playlists as $playlist)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition relative">
                <a href="{{ route('playlists.show', $playlist) }}" class="block">
                    <img src="{{ asset('storage/' . $playlist->cover) }}"
                         alt="{{ $playlist->name }}"
                         class="w-full h-48 object-cover rounded-t-lg"
                         onerror="this.src='https://via.placeholder.com/400x200?text=Playlist';">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $playlist->name }}</h2>
                    </div>
                </a>
                
                <!-- Delete Button -->
                <form action="{{ route('playlists.destroy', $playlist) }}" method="POST" class="absolute top-2 right-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this playlist?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
</x-master>
