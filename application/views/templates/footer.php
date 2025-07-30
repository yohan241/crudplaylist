<!-- Persistent Music Player Footer -->
<div id="musicPlayerFooter"
  class="fixed-bottom bg-white border-top border-dark shadow-lg align-items-center justify-content-between px-3 py-2"
  style="z-index: 9999; min-height: 70px; display: none;">
  <div class="d-flex align-items-center gap-3">
    <button id="playerPrev" class="btn btn-outline-secondary btn-sm"><i class="bi bi-skip-backward-fill"></i></button>
    <button id="playerPlayPause" class="btn btn-outline-primary btn-sm"><i class="bi bi-play-fill"></i></button>
    <button id="playerNext" class="btn btn-outline-secondary btn-sm"><i class="bi bi-skip-forward-fill"></i></button>
    <div class="ms-3">
      <img src="" class="img-thumbnail me-2" id="playerSongImage" style="width:50px; height:50px; object-fit:cover;">
      <span id="playerSongTitle" class="fw-bold">No song playing</span>
      <span id="playerSongArtist" class="text-muted ms-2"></span>
    </div>
  </div>
  <audio id="audioPlayer" preload="none"></audio>
  <div class="d-flex align-items-center gap-2">
    <span id="playerCurrentTime" style="min-width: 40px;">0:00</span>
    <input type="range" id="playerSeek" min="0" max="100" value="0" style="width: 120px;">
    <span id="playerDuration" style="min-width: 40px;">0:00</span>
    <button id="playerClose" class="btn btn-outline-danger btn-sm ms-2" title="Hide player">■</button>
  </div>
</div>


<script>
  // --- Music Player Logic ---
  const playerFooter = document.getElementById('musicPlayerFooter');
  const audio = document.getElementById('audioPlayer');
  const playPauseBtn = document.getElementById('playerPlayPause');
  const prevBtn = document.getElementById('playerPrev');
  const nextBtn = document.getElementById('playerNext');
  const closeBtn = document.getElementById('playerClose');
  const seekBar = document.getElementById('playerSeek');
  const currentTimeEl = document.getElementById('playerCurrentTime');
  const durationEl = document.getElementById('playerDuration');
  const titleEl = document.getElementById('playerSongTitle');
  const artistEl = document.getElementById('playerSongArtist');
  const songImageEl = document.getElementById('playerSongImage');
  let playlist = [];
  let currentIndex = 0;

  function formatTime(sec) {
    sec = Math.floor(sec);
    return `${Math.floor(sec / 60)}:${('0' + (sec % 60)).slice(-2)}`;
  }

  function loadSong(index) {
    if (!playlist[index]) return;
    const song = playlist[index];
    audio.src = song.url;
    titleEl.textContent = song.title;
    artistEl.textContent = song.artist ? `by ${song.artist}` : '';
    console.log("Loading song:", song.title, "by", song.artist);
    console.log("Song image path:", song.image_path);
    console.log(song);
    if (!song.image_path || song.image_path === 'http://localhost/crudplaylist/') {
      songImageEl.style.display = 'none';
    } else {
      songImageEl.src = song.image_path;
      songImageEl.style.display = 'inline-block'; // or 'block', depending on your layout
    }
    playerFooter.style.display = '';
    playerFooter.classList.add('d-flex');

    audio.load();
    audio.play();
    updatePlayPauseIcon();
  }

  function updatePlayPauseIcon() {
    playPauseBtn.querySelector('i').className = audio.paused ? 'bi bi-play-fill' : 'bi bi-pause-fill';
  }

  playPauseBtn.onclick = function () {
    if (audio.src) {
      if (audio.paused) audio.play();
      else audio.pause();
      updatePlayPauseIcon();
    }
  };
  prevBtn.onclick = function () {
    if (playlist.length) {
      currentIndex = (currentIndex - 1 + playlist.length) % playlist.length;
      loadSong(currentIndex);
    }
  };
  nextBtn.onclick = function () {
    if (playlist.length) {
      currentIndex = (currentIndex + 1) % playlist.length;
      loadSong(currentIndex);
    }
  };
  closeBtn.onclick = function () {
    playerFooter.style.display = 'none';
    playerFooter.classList.remove('d-flex');
    console.log("hiasdsadsdsd");

    audio.pause();
  };
  audio.addEventListener('ended', function () {
    if (playlist.length) {
      currentIndex = (currentIndex + 1) % playlist.length;
      loadSong(currentIndex);
    }
  });
  audio.addEventListener('timeupdate', function () {
    seekBar.value = audio.duration ? (audio.currentTime / audio.duration) * 100 : 0;
    currentTimeEl.textContent = formatTime(audio.currentTime);
    durationEl.textContent = formatTime(audio.duration || 0);
  });
  seekBar.addEventListener('input', function () {
    if (audio.duration) {
      audio.currentTime = (seekBar.value / 100) * audio.duration;
    }
  });

  // Expose a global function to set the playlist and start playing
  window.startPlaylist = function (songs, startIdx = 0) {
    playlist = songs;
    currentIndex = startIdx;
    loadSong(currentIndex);
  };
</script>
<script src="/docs/5.3/assets/js/color-modes.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>