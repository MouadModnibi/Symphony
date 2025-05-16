<x-master title="Edit Song">
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="mb-8 border-b border-gray-200 pb-4">
        <h1 class="text-3xl font-bold text-gray-900">Edit Song</h1>
        <p class="mt-2 text-sm text-gray-600">Update your song details and files</p>
    </div>

    <!-- Error Alert -->
    @if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Current Cover Preview -->
    <div class="mb-6">
        <h3 class="text-sm font-medium text-gray-700 mb-2">Current Cover Image</h3>
        <div class="w-48 h-48 rounded-lg overflow-hidden border border-gray-200">
            <img src="{{ asset('storage/' . $song->cover_image) }}" 
                 alt="Current cover image" 
                 class="w-full h-full object-cover"
                 onerror="this.src='https://via.placeholder.com/300?text=No+Cover'">
        </div>
    </div>

    <!-- Edit Form -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <form method="POST" action="{{ route('songs.update', $song->id) }}" enctype="multipart/form-data" class="space-y-6 p-6">
            @csrf
            @method('PUT')
            
            <!-- Title Field -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Song Title</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $song->title) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('title') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Genre Field -->
            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                <input type="text" 
                       id="genre" 
                       name="genre" 
                       value="{{ old('genre', $song->genre) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('genre') border-red-300 text-red-900 placeholder-red-300 focus:border-red-500 focus:ring-red-500 @enderror">
                @error('genre')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Cover Image Upload -->
            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700">Update Cover Image</label>
                <div class="mt-1 flex items-center">
                    <input type="file" 
                           id="cover_image" 
                           name="cover_image" 
                           accept="image/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <p class="mt-2 text-xs text-gray-500">JPEG, PNG, or GIF (Max 2MB)</p>
            </div>

            <!-- Audio File Upload -->
            <div>
                <label for="file_path" class="block text-sm font-medium text-gray-700">Update Audio File</label>
                <div class="mt-1 flex items-center">
                    <input type="file" 
                           id="file_path" 
                           name="file_path" 
                           accept="audio/*"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <p class="mt-2 text-xs text-gray-500">MP3, WAV, or AAC (Max 10MB)</p>
            </div>

            <!-- Current Audio Preview -->
            @if($song->file_path)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Current Audio File</h3>
                <audio controls class="w-full">
                    <source src="{{ asset('storage/' . $song->file_path) }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
            @endif

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    Update Song
                </button>
            </div>
        </form>
    </div>
</div>
</x-master>