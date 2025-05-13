@props(['filePath', 'title'])

<div id="bottomPlayer" class="fixed-bottom bg-dark text-white d-none p-3 shadow-lg" style="z-index: 1050;">
    <div class="container d-flex align-items-center justify-content-between">
        <div>
            <strong id="songTitle">{{ $title }}</strong>
        </div>

        <!-- Hidden audio element -->
        <audio id="bottomAudio" style="display:none;"></audio>

        <div class="d-flex align-items-center gap-3" style="width: 70%;">
            <!-- Play/Pause Button -->
            <button id="togglePlay" class="btn btn-light btn-sm">▶️</button>

            <!-- Progress Bar (Seek Bar) -->
            <input type="range" id="progressBar" value="0" max="100" step="1" class="form-range w-100" />

            <!-- Volume Control -->
            <input type="range" id="volumeControl" min="0" max="1" step="0.01" value="1" class="form-range" style="width: 100px;" />
        </div>
    </div>
</div>

<script>
    let audio = document.getElementById("bottomAudio");
    let progressBar = document.getElementById("progressBar");
    let volumeControl = document.getElementById("volumeControl");
    let playBtn = document.getElementById("togglePlay");

    // Function to show the bottom player and control audio
    function showBottomPlayer(title, filePath) {
        // Show the player
        document.getElementById("bottomPlayer").classList.remove("d-none");
        document.getElementById("songTitle").innerText = title;

        // Set audio source and load
        audio.src = filePath;
        audio.load(); // Ensure audio is loaded before playing
        audio.play();
        playBtn.innerText = "⏸️";  // Change play button to pause

        // Update progress bar as audio plays
        audio.ontimeupdate = () => {
            if (!isNaN(audio.duration)) {
                progressBar.value = (audio.currentTime / audio.duration) * 100;
            }
        };

        // When user clicks the progress bar, update the audio position
        progressBar.oninput = () => {
            if (!isNaN(audio.duration)) {
                const seekTime = (progressBar.value / 100) * audio.duration;
                audio.currentTime = seekTime;
            }
        };

        // Update volume
        volumeControl.oninput = () => {
            audio.volume = volumeControl.value;
        };

        // Toggle play/pause functionality
        playBtn.onclick = () => {
            if (audio.paused) {
                audio.play();
                playBtn.innerText = "⏸️"; // Change button text to pause
            } else {
                audio.pause();
                playBtn.innerText = "▶️"; // Change button text to play
            }
        };
    }
</script>
