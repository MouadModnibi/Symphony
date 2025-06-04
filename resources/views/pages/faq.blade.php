<x-master title="FAQ">
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-purple-50">
        <div class="container mx-auto px-4 py-16 max-w-4xl">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h1>
                <div class="w-24 h-1.5 bg-purple-600 mx-auto rounded-full mb-6"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Find quick answers to common questions about our music platform.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 md:p-8 space-y-4">
                    <!-- FAQ Item 1 - Interactive -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button 
                            @click="open = !open" 
                            class="flex justify-between items-center w-full text-left focus:outline-none"
                        >
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-purple-600 transition">
                                How do I create a playlist?
                            </h2>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="h-6 w-6 text-purple-600 transition-transform duration-200" 
                                :class="{ 'transform rotate-180': open }"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 pl-2">
                            <p class="text-gray-700">
                                Creating playlists is easy! Navigate to "My Playlists" in your account and click the "Create New Playlist" button. 
                                Give your playlist a name and description, then start adding songs from our extensive library or your personal uploads.
                            </p>
                            <div class="mt-3 bg-purple-50 p-3 rounded-lg border border-purple-100">
                                <p class="text-sm text-purple-800 flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Pro Tip: You can make playlists collaborative to allow friends to add songs too!</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 - Interactive -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button 
                            @click="open = !open" 
                            class="flex justify-between items-center w-full text-left focus:outline-none"
                        >
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-purple-600 transition">
                                Can I upload my own songs?
                            </h2>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="h-6 w-6 text-purple-600 transition-transform duration-200" 
                                :class="{ 'transform rotate-180': open }"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 pl-2">
                            <p class="text-gray-700">
                                Absolutely! You can upload your own music files in MP3, WAV, or FLAC format (up to 50MB per file). 
                                Use the "Add Song" button in your library and select files from your device.
                            </p>
                            <div class="mt-3 bg-yellow-50 p-3 rounded-lg border border-yellow-100">
                                <p class="text-sm text-yellow-800 flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Important: Only upload music you have rights to distribute. Copyright violations may result in account suspension.</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 - Interactive -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button 
                            @click="open = !open" 
                            class="flex justify-between items-center w-full text-left focus:outline-none"
                        >
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-purple-600 transition">
                                What's the difference between free and premium?
                            </h2>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="h-6 w-6 text-purple-600 transition-transform duration-200" 
                                :class="{ 'transform rotate-180': open }"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 pl-2">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Feature</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Free</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Premium</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Audio Quality</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Standard (128kbps)</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 font-medium">High (320kbps)</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Ads</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Yes</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 font-medium">No</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">Offline Listening</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">No</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700 font-medium">Yes</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 - Interactive -->
                    <div x-data="{ open: false }" class="border-b border-gray-200 pb-4">
                        <button 
                            @click="open = !open" 
                            class="flex justify-between items-center w-full text-left focus:outline-none"
                        >
                            <h2 class="text-xl font-semibold text-gray-800 hover:text-purple-600 transition">
                                How do I cancel my subscription?
                            </h2>
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                class="h-6 w-6 text-purple-600 transition-transform duration-200" 
                                :class="{ 'transform rotate-180': open }"
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="mt-2 pl-2">
                            <p class="text-gray-700">
                                You can cancel anytime from your Account Settings:
                            </p>
                            <ol class="list-decimal pl-5 mt-2 space-y-1 text-gray-700">
                                <li>Go to your profile picture → Account Settings</li>
                                <li>Select "Subscription"</li>
                                <li>Click "Cancel Subscription"</li>
                                <li>Follow the prompts to confirm</li>
                            </ol>
                            <div class="mt-3 bg-blue-50 p-3 rounded-lg border border-blue-100">
                                <p class="text-sm text-blue-800">
                                    Your premium benefits will continue until the end of your current billing period.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4">
                    <div class="text-center">
                        <p class="text-gray-600">
                            Didn't find your answer? <a href="/contact" class="text-purple-600 font-medium hover:underline">Contact our support team</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AlpineJS for interactive FAQ -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-master>