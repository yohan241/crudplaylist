<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2>Edit Song</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="<?php echo htmlspecialchars($song['title']); ?>" required>
        </div>
        <?php if (!empty($song['image_path'])): ?>
            <div class="mb-3">
                <label>Current Image:</label><br>
                <img src="<?= base_url($song['image_path']); ?>" alt="Current Image" style="max-width: 150px;">
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="song_image" class="form-label">Song Image (optional)</label>
            <input type="file" class="form-control" id="song_image" name="song_image" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist"
                value="<?php echo htmlspecialchars($song['artist']); ?>">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre"
                value="<?php echo htmlspecialchars($song['genre']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="<?php echo site_url('my_songs'); ?>" class="btn btn-link">Cancel</a>
    </form>
</div>
<?php $this->load->view('templates/footer'); ?>