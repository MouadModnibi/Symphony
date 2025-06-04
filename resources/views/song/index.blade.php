<x-master title="Songs">
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header with more visible colors -->
        <!-- Page Header with more visible colors -->
<div class="text-center mb-10">
    <h1 class="text-4xl  text-blue-800">Discover Music</h1>
    <p class="text-2xl  text-gray-800">Browse our collection of songs</p>
    
</div>


        <!-- Songs Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-6">
            
            @foreach ($songs as $song)
                <x-song-card :song="$song" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4"> 
                {{ $songs->links() }}
            </div>
        </div>

        <!-- Music Player - Initially hidden -->
        <x-musicplayer filePath="" title="" class="hidden" />
    </div>

    <!-- Custom styling for pagination -->
    <style>
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .page-item {
            margin: 0 4px;
        }
        .page-link {
            display: block;
            padding: 8px 12px;
            border-radius: 6px;
            color: #4b5563;
            font-weight: 500;
            transition: all 0.2s;
        }
        .page-item.active .page-link {
            background-color: #6366f1;
            color: white;
        }
        .page-item:not(.active) .page-link:hover {
            background-color: #f3f4f6;
            color: #1f2937;
        }
        .dark .page-link {
            color: #d1d5db;
        }
        .dark .page-item:not(.active) .page-link:hover {
            background-color: #374151;
            color: #f9fafb;
        }
    </style>
</x-master>