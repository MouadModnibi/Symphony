<x-master title="Add Song">
<div class="max-w-2xl mx-auto py-8 px-4">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Add New Song</h1>
        <p class="mt-1 text-gray-600">Upload your music and share it with the world</p>
    </div>

    <!-- Error Alert -->
    @if ($errors->any())
    <x-alert type="danger" class="mb-6">
        <h4 class="font-medium">Validation Errors</h4>
        <ul class="list-disc pl-5 mt-1">
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </x-alert>
    @endif

    <!-- Add Song Form -->
    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Title Field -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Song Title *</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}" 
                   required
                   class="w-full px-0 py-2 border-0 border-b border-gray-300 focus:border-blue-500 focus:ring-0 sm:text-sm @error('title') border-red-500 @enderror"
                   placeholder="My Awesome Song">
            @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Genre Field -->
        <div>
            <label for="genre" class="block text-sm font-medium text-gray-700 mb-1">Genre *</label>
            <input type="text" 
                   id="genre" 
                   name="genre" 
                   value="{{ old('genre') }}" 
                   required
                   class="w-full px-0 py-2 border-0 border-b border-gray-300 focus:border-blue-500 focus:ring-0 sm:text-sm @error('genre') border-red-500 @enderror"
                   placeholder="Rock, Pop, Hip-Hop...">
            @error('genre')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Audio File Upload -->
        <div>
            <label for="file_path" class="block text-sm font-medium text-gray-700 mb-1">Audio File *</label>
            <div class="relative">
                <input type="file" 
                       id="file_path" 
                       name="file_path" 
                       required
                       accept="audio/*"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                <div class="flex items-center justify-between px-0 py-2 border-0 border-b border-gray-300">
                    <span class="text-gray-500">Choose File</span>
                    <span class="text-sm text-gray-400">No file chosen</span>
                </div>
            </div>
            <p class="mt-1 text-xs text-gray-500">Accepted formats: MP3, WAV, AAC (Max 20MB)</p>
            @error('file_path')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Cover Image Upload -->
        <div>
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
            <div class="relative">
                <input type="file" 
                       id="cover_image" 
                       name="cover_image" 
                       accept="image/*"
                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                <div class="flex items-center justify-between px-0 py-2 border-0 border-b border-gray-300">
                    <span class="text-gray-500">Choose File</span>
                    <span class="text-sm text-gray-400">No file chosen</span>
                </div>
            </div>
            <p class="mt-1 text-xs text-gray-500">JPEG, PNG (Recommended: 1000×1000 pixels)</p>
            @error('cover_image')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="pt-6">
            <button type="submit" class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors duration-200">
                Upload Song
            </button>
        </div>
    </form>
</div>
</x-master>