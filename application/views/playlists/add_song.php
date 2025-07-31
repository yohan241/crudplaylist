 
<div class="container mt-5 px-5 w-100">
<div class="formpage">
    <h2>Add Song to Playlist: <?php echo htmlspecialchars($playlist['name']); ?></h2>
    
    <form style="align-content:center;" method="post" action="">
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
            <div class="btn-group text-right" role="group">
      
        <button type="submit" class="btn btn-primary">Add Song</button>
        <a href="<?php echo site_url('playlists'); ?>" class="btn btn-link">Back to My Playlists</a>
        </div>
    </form>
</div>
</div>
