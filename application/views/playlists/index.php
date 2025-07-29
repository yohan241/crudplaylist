<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2 class=" mb-3"> <i class="bi bi-music-note-list mb-3" >&nbsp;My Playlists</i></h2>
    <a href="<?php echo site_url('create_playlist'); ?>" class="btn btn-success mb-3">Create New Playlist</a>
    <?php if (empty($playlists)): ?>
        <div class="alert alert-info">You have no playlists yet.</div>
    <?php else: ?>
        <div class="d-flex flex-column gap-3">
            <?php foreach ($playlists as $playlist): ?>
                <div class="neo-brutal-window p-3 mb-3" style="border-radius:18px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($playlist['name']); ?></h5>
                            <div class="text-muted mb-2">Created: <?php echo htmlspecialchars($playlist['created_at']); ?></div>
                        </div>
                        <div>
                            <a href="<?php echo site_url('add_song_to_playlist/' . $playlist['id']); ?>" class="btn btn-primary btn-sm">Add Song</a>
                            <a href="<?php echo site_url('delete_playlist/' . $playlist['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this playlist?');">Delete</a>
                        </div>
                    </div>
                    <div class="accordion mt-3" id="playlistAccordion<?php echo $playlist['id']; ?>">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $playlist['id']; ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $playlist['id']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $playlist['id']; ?>">
                                    Songs in this playlist
                                </button>
                            </h2>
                            <div id="collapse<?php echo $playlist['id']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $playlist['id']; ?>" data-bs-parent="#playlistAccordion<?php echo $playlist['id']; ?>">
                                <div class="accordion-body">
                                    <?php if (!empty($playlist_songs[$playlist['id']])): ?>
                                        <div class="row g-2">
                                            <?php foreach ($playlist_songs[$playlist['id']] as $song): ?>
                                                <div class="col-12">
                                                    <div class="neo-brutal-window p-2 d-flex flex-column" style="border-radius:12px; background:#f8f9fa;">
                                                    <?php if (!empty($song['image_path'])): ?>
                                                        <img src="<?= base_url($song['image_path']); ?>" class="img-thumbnail me-2" style="width:78px; height:78px; object-fit:cover;">
                                                    <?php endif; ?>
                                                        <div class="fw-bold"><?php echo htmlspecialchars($song['title']); ?></div>
                                                        <div class="text-muted mb-1"><?php echo htmlspecialchars($song['artist']); ?> &mdash; <span class="badge bg-secondary"><?php echo htmlspecialchars($song['genre']); ?></span></div>
                                                        <div class="mb-1"><span class="badge bg-info text-dark">Uploaded by <?php echo htmlspecialchars($song['username']); ?></span></div>
                                                        <div class="mb-1 text-center">
                                                            <button class="btn btn-success btn-sm" onclick='window.startPlaylist([
                                                                <?php foreach ($playlist_songs[$playlist['id']] as $s) { ?>
                                                                    { url: "<?php echo base_url($s['file_path']); ?>", title: <?php echo json_encode($s['title']); ?>, artist: <?php echo json_encode($s['artist']); ?> },
                                                                <?php } ?>
                                                            ], <?php echo $song['id']; ?> - <?php echo $playlist_songs[$playlist['id']][0]['id']; ?>)'>Play</button>
                                                        </div>
                                                        <div class="d-flex gap-2">
                                                            <a href="<?php echo site_url('remove_song_from_playlist/' . $playlist['id'] . '/' . $song['id']); ?>" class="btn btn-danger btn-sm flex-fill" onclick="return confirm('Remove this song from playlist?');">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-info mt-2">No songs in this playlist yet.</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>
