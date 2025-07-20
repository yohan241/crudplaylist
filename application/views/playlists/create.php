<?php $this->load->view('templates/header'); ?>
<div class="container  bg-white vh-100 border border-dark position-absolute start-50 translate-middle-x z-n1"> </div>
<div class="container mt-5">
    <h2>Create Playlist</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('create_playlist'); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Playlist Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="<?php echo site_url('playlists'); ?>" class="btn btn-link">Back to My Playlists</a>
    </form>
</div>
<?php $this->load->view('templates/footer'); ?>
