<x-master title="{{ $user->name }}'s Profile">
<div class="container mx-auto px-4 py-8">
    <!-- Profile Card -->
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Cover Photo -->
        <div class="h-48 bg-gradient-to-r from-blue-500 to-purple-600 relative">
            <!-- Profile Picture -->
            <div class="absolute -bottom-16 left-6">
                <div class="h-32 w-32 rounded-full border-4 border-white bg-white shadow-lg overflow-hidden">
                    <img class="h-full w-full object-cover" 
                         src="{{ asset('storage/' . $user->pfp) }}" 
                         alt="{{ $user->name }}'s profile picture"
                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random'">
                </div>
            </div>
        </div>

        <!-- Profile Content -->
        <div class="pt-20 px-6 pb-6">
            <!-- Name and Basic Info -->
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                    
                </div>
                @if(auth()->id() === $user->id)
                <a href="{{ route('user.settings',$user) }}" 
                   class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors">
                    Edit Profile
                </a>
                @endif
            </div>

            <!-- Bio -->
            <div class="mt-4">
                <p class="text-gray-700">{{ $user->bio ?? 'No bio yet' }}</p>
            </div>

            <!-- Stats -->
            <div class="mt-6 flex space-x-6">
                <div class="text-center">
                    <span class="block text-2xl font-bold text-gray-800">142</span>
                    <span class="text-sm text-gray-500">Followers</span>
                </div>
                <div class="text-center">
                    <span class="block text-2xl font-bold text-gray-800">86</span>
                    <span class="text-sm text-gray-500">Following</span>
                </div>
                <div class="text-center">
                    <span class="block text-2xl font-bold text-gray-800">24</span>
                    <span class="text-sm text-gray-500">Playlists</span>
                </div>
            </div>
        </div>

        <!-- Tabs -->
       <!-- Tabs -->
<div class="border-t border-gray-200">
    <nav class="flex">
        <a href="#" class="px-6 py-4 text-sm font-medium text-blue-600 border-b-2 border-blue-600">Songs</a>
        <a href="{{ route('playlists.index') }}" 
           class="px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700">Playlists</a>
        <a href="#" class="px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700">Likes</a>
        <a href="#" class="px-6 py-4 text-sm font-medium text-gray-500 hover:text-gray-700">Following</a>
    </nav>
</div>


        <!-- Content Section -->
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Recently Added Songs</h3>
            <!-- Song list would go here -->
            <div class="bg-gray-50 rounded-lg p-8 text-center">
                <p class="text-gray-500">No songs added yet</p>
            </div>
        </div>
    </div>
</div>
</x-master>