@props(['filePath', 'title'])

<div id="bottomPlayer" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white hidden p-3 shadow-lg z-50 transform transition-transform duration-300 translate-y-full">
    <div class="container mx-auto flex items-center justify-between gap-4">
        <!-- Song Info -->
        <div class="flex items-center gap-3 min-w-0">
            <div class="flex-shrink-0">
                <div class="h-10 w-10 bg-gray-700 rounded"></div>
            </div>
            <div class="min-w-0">
                <p id="songTitle" class="text-sm font-medium truncate">{{ $title }}</p>
                <p class="text-xs text-gray-400 truncate">Artist Name</p>
            </div>
        </div>

        <!-- Audio Controls -->
        <div class="flex-1 max-w-2xl flex items-center gap-4">
            <!-- Previous Button -->
            <button class="text-gray-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Play/Pause Button -->
            <button id="togglePlay" class="bg-white text-black rounded-full h-8 w-8 flex items-center justify-center hover:scale-105 transition-transform">
                <svg id="playIcon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
                <svg id="pauseIcon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Next Button -->
            <button class="text-gray-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Progress Bar -->
            <div class="flex-1 flex items-center gap-2">
                <span id="currentTime" class="text-xs text-gray-400 w-10">0:00</span>
                <input type="range" id="progressBar" value="0" max="100" step="0.1" class="w-full h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer" />
                <span id="duration" class="text-xs text-gray-400 w-10">0:00</span>
            </div>
        </div>

        <!-- Volume and Other Controls -->
        <div class="flex items-center gap-3">
            <!-- Volume Control -->
            <div class="flex items-center gap-2 w-24">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072M12 6a7.975 7.975 0 015.657 2.343m0 0a7.975 7.975 0 010 11.314m-11.314 0a7.975 7.975 0 010-11.314m0 0a7.975 7.975 0 015.657-2.343" />
                </svg>
                <input type="range" id="volumeControl" min="0" max="1" step="0.01" value="1" class="w-full h-1 bg-gray-700 rounded-lg appearance-none cursor-pointer" />
            </div>

            <!-- Close Button -->
            <button id="closePlayer" class="text-gray-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Hidden audio element -->
    <audio id="bottomAudio" class="hidden"></audio>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const audio = document.getElementById("bottomAudio");
        const progressBar = document.getElementById("progressBar");
        const volumeControl = document.getElementById("volumeControl");
        const togglePlay = document.getElementById("togglePlay");
        const playIcon = document.getElementById("playIcon");
        const pauseIcon = document.getElementById("pauseIcon");
        const currentTimeEl = document.getElementById("currentTime");
        const durationEl = document.getElementById("duration");
        const closePlayer = document.getElementById("closePlayer");
        const bottomPlayer = document.getElementById("bottomPlayer");

        // Format time from seconds to MM:SS
        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
        }

        // Show the player and control audio
        window.showBottomPlayer = function(title, filePath) {
            // Show the player with animation
            bottomPlayer.classList.remove("hidden");
            setTimeout(() => {
                bottomPlayer.classList.remove("translate-y-full");
            }, 10);

            // Set song info
            document.getElementById("songTitle").textContent = title;
            
            // Set audio source and load
            audio.src = filePath;
            audio.load();
            audio.play();
            playIcon.classList.add("hidden");
            pauseIcon.classList.remove("hidden");

            // Update progress bar as audio plays
            audio.ontimeupdate = () => {
                if (!isNaN(audio.duration)) {
                    progressBar.value = (audio.currentTime / audio.duration) * 100;
                    currentTimeEl.textContent = formatTime(audio.currentTime);
                }
            };

            // Update duration when metadata is loaded
            audio.onloadedmetadata = () => {
                durationEl.textContent = formatTime(audio.duration);
            };

            // When audio ends
            audio.onended = () => {
                playIcon.classList.remove("hidden");
                pauseIcon.classList.add("hidden");
            };
        };

        // Seek functionality
        progressBar.oninput = () => {
            if (!isNaN(audio.duration)) {
                const seekTime = (progressBar.value / 100) * audio.duration;
                audio.currentTime = seekTime;
            }
        };

        // Volume control
        volumeControl.oninput = () => {
            audio.volume = volumeControl.value;
        };

        // Toggle play/pause
        togglePlay.onclick = () => {
            if (audio.paused) {
                audio.play();
                playIcon.classList.add("hidden");
                pauseIcon.classList.remove("hidden");
            } else {
                audio.pause();
                playIcon.classList.remove("hidden");
                pauseIcon.classList.add("hidden");
            }
        };

        // Close player
        closePlayer.onclick = () => {
            bottomPlayer.classList.add("translate-y-full");
            setTimeout(() => {
                bottomPlayer.classList.add("hidden");
                audio.pause();
                playIcon.classList.remove("hidden");
                pauseIcon.classList.add("hidden");
            }, 300);
        };
    });
</script>