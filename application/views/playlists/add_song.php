<?php $this->load->view('templates/header'); ?>
<div class="container  bg-white vh-100 border border-dark position-absolute start-50 translate-middle-x z-n1"> </div>
<div class="container mt-5 w-100">
    <h2>Add Song to Playlist: <?php echo htmlspecialchars($playlist['name']); ?></h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="song_id" class="form-label">Select Song</label>
            <select class="form-control" id="song_id" name="song_id" required>
                <option value="">Choose a song...</option>
                <?php foreach ($songs as $song): ?>
                    <option value="<?php echo $song['id']; ?>">
                        <?php echo htmlspecialchars($song['title'] . ' by ' . $song['artist']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Song</button>
        <a href="<?php echo site_url('playlists'); ?>" class="btn btn-link">Back to My Playlists</a>
    </form>
</div>
<?php $this->load->view('templates/footer'); ?>
