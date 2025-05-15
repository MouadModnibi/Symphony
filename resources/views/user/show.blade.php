
<x-master title="Profile">
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex items-center p-6">
            <!-- Profile Picture -->
            <div class="md:shrink-0">
                <img class="h-32 w-32 rounded-full object-cover" src="{{ asset('storage/' . auth()->user()->pfp) }}" alt="Profile Picture">
            </div>

            <!-- User Info -->
            <div class="ml-6">
                <div class="text-xl font-medium text-black">{{ $user->name }}</div>
                <p class="mt-2 text-gray-500">{{ $user->bio }}</p>
            </div>
        </div>
    </div>
</div></x-master>