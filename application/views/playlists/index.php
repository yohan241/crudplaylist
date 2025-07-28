<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2>My Playlists</h2>
    <a href="<?php echo site_url('create_playlist'); ?>" class="btn btn-success mb-3">Create New Playlist</a>
    <?php if (empty($playlists)): ?>
        <div class="alert alert-info">You have no playlists yet.</div>
    <?php else: ?>
        <table class="table table-striped table-responsive table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($playlists as $playlist): ?>
                    <tr>
                        <td>
                            <a class="btn btn-link" data-bs-toggle="collapse" href="#playlistCollapse<?php echo $playlist['id']; ?>" role="button" aria-expanded="false" aria-controls="playlistCollapse<?php echo $playlist['id']; ?>">
                                <?php echo htmlspecialchars($playlist['name']); ?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($playlist['created_at']); ?></td>
                        <td>
                            <a href="<?php echo site_url('add_song_to_playlist/' . $playlist['id']); ?>" class="btn btn-sm btn-primary">Add Song</a>
                            <a href="<?php echo site_url('delete_playlist/' . $playlist['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this playlist?');">Delete</a>
                        </td>
                    </tr>
                    <tr class="collapse" id="playlistCollapse<?php echo $playlist['id']; ?>">
                        <td colspan="3">
                            <?php if (!empty($playlist_songs[$playlist['id']])): ?>
                                <div class="mb-2"><strong>Songs in this playlist:</strong></div>
                                <table class="table table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Artist</th>
                                            <th>Genre</th>
                                            <th>Uploaded By</th>
                                            <th style=" text-align: center;">Play</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($playlist_songs[$playlist['id']] as $song): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($song['title']); ?></td>
                                                <td><?php echo htmlspecialchars($song['artist']); ?></td>
                                                <td><?php echo htmlspecialchars($song['genre']); ?></td>
                                                <td><?php echo htmlspecialchars($song['username']); ?></td>
                                                <td style=" text-align: center;">
                                                    <button class="btn btn-success btn-sm" onclick='window.startPlaylist([
                                                        <?php foreach ($playlist_songs[$playlist['id']] as $s) { ?>
                                                            { url: "<?php echo base_url($s['file_path']); ?>", title: <?php echo json_encode($s['title']); ?>, artist: <?php echo json_encode($s['artist']); ?> },
                                                        <?php } ?>
                                                    ], <?php echo $song['id']; ?> - <?php echo $playlist_songs[$playlist['id']][0]['id']; ?>)'>Play</button>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('remove_song_from_playlist/' . $playlist['id'] . '/' . $song['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove this song from playlist?');">Remove</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="text-muted">No songs in this playlist yet.</div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>
