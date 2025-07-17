<?php $this->load->view('templates/header'); ?>
<div class="container mt-5">
    <h2>Upload Song</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('upload_song'); ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre">
        </div>
        <div class="mb-3">
            <label for="song_file" class="form-label">Song File</label>
            <input type="file" class="form-control" id="song_file" name="song_file" accept=".mp3,.wav,.ogg" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
<?php $this->load->view('templates/footer'); ?>
