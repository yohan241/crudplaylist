 <style>
    @keyframes appear {
        0% {
          opacity: 0;

          transform: translateX(-100%);
          filter: blur(10px);
        }
        50% {
          opacity: 0.3;

          transform: translateX(-80%);
          filter: blur(7px);
        }
        100% {
          opacity: 1;
          transform: translateX(0);
          filter: blur(0px);
        }
      }
      @media screen and (max-width: 768px) {
        .song-card {
        animation: appear 0.5s ease-in-out;
        animation-timeline: view();
        animation-range: entry 0% cover 20%;
      }
        }
      

 </style>


<div class="container mt-3 px-4">
    <h2 class=" mb-3"><i class="bi bi-music-note-beamed "> &nbsp;All Songs</i></h2>
    <?php if (empty($songs)): ?>
        <div class="alert alert-info">Uh Oh, no songs are present :<< </div>
        <a href="<?php echo site_url('upload_song'); ?>" class="btn btn-success mb-3">Upload a Song</a>
            <?php else: ?>
                <div class="row g-3 mb-5">
                    <?php foreach ($songs as $song): ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="song-card neo-brutal-window p-3 h-100 d-flex flex-row justify-content-between align-items-center"
                                style="border-radius:18px;">
                                <!-- Top Part -->
                                <div class="d-flex mw-100">
                                    <div class="imgspace">
                                        <?php if (!empty($song['image_path'])): ?>
                                            <img src="<?= base_url($song['image_path']); ?>" class="img-thumbnail me-2"
                                                style="width:78px; height:78px; object-fit:cover;">
                                        <?php endif; ?>
                                    </div>
                                    <audio class="audio-source" src="<?= base_url($song['file_path']) ?>"></audio>
                                    <div class="song_details" style="max-width: 100%;">
                                        <h5 class="fw-bold mb-1 noexceed"><?php echo htmlspecialchars($song['title']); ?> </h5>
                                        
                                        <div class="text-muted mb-2 noexceed"><?php echo htmlspecialchars($song['artist']); ?>
                                            &mdash;
                                            
                                                <span class="badge bg-success text-dark duration me-1">duration</span>
                                        </div>
                                        <div class="mb-2"><span
                                                class="badge bg-secondary me-1"><?php echo htmlspecialchars($song['genre']); ?></span><span class="badge bg-info text-dark">Uploaded by
                                                <?php echo htmlspecialchars($song['username']); ?></span></div>
                                    </div>
                                </div>
                                <!-- Audio Player -->
                                <div class=" text-center d-flex flex-column gap-2">
                                    <button class="btn btn-success btn-sm" style="    border-radius: 30px; height: 40px;"
                                        onclick='window.startPlaylist([{
                                url: "<?php echo base_url($song['file_path']); ?>",
                                title: <?php echo json_encode($song['title']); ?>,
                                artist: <?php echo json_encode($song['artist']); ?>,
                                image_path: "<?php echo base_url($song['image_path']); ?>"
                            }], 0)'><i class="bi bi-play-circle-fill icon-outline fa-10x"
                                            style=" font-size: 1.5em;"></i></button>

                                    <!-- Add to Playlist Button -->
                                    
                                    <button class="btn btn-warning btn-sm" style="border-radius: 30px; height: 40px;"
                                        data-bs-toggle="modal" data-bs-target="#addToPlaylistModal"
                                        onclick="setModalSongId(<?= $song['id'] ?>)">
                                        <i class="bi bi-plus-circle-fill icon-outline" style="font-size: 1.2em;"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
    </div>
    <?php if (!empty($pagination_links)): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo $pagination_links; ?>
    </div>
<?php endif; ?>

    <!-- Add to Playlist Modal -->
    <div class="modal fade" id="addToPlaylistModal" tabindex="-1" aria-labelledby="addToPlaylistModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="<?= site_url('playlists/add_song_dynamic') ?>" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToPlaylistModalLabel">Add Song to Playlist</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="song_id" id="modal-song-id">
                    <div class="mb-3">
                        <label for="playlistSelect" class="form-label">Choose a playlist:</label>
                        <select name="playlist_id" id="playlistSelect" class="form-select" required>
                            <?php foreach ($playlists as $playlist): ?>
                                <option value="<?= $playlist['id'] ?>"><?= htmlspecialchars($playlist['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add to Playlist</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
     
    <script>
  function setModalSongId(songId) {
    document.getElementById('modal-song-id').value = songId;
  }

document.addEventListener('DOMContentLoaded', function () {
  const songCards = document.querySelectorAll('.song-card');

  songCards.forEach(card => {
    const audio = card.querySelector('.audio-source');
    const durationDisplay = card.querySelector('.duration');

    // Wait until metadata (like duration) is loaded
    audio.addEventListener('loadedmetadata', () => {
      const duration = audio.duration;
      const minutes = Math.floor(duration / 60);
      const seconds = Math.floor(duration % 60).toString().padStart(2, '0');
      durationDisplay.innerHTML = `${minutes}:${seconds}`;
    });
  });
});


</script>
