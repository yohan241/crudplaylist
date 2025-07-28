<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2>My Songs</h2>
    <?php if (empty($songs)): ?>
        <div class="alert alert-info">You have not uploaded any songs yet.</div>
    <?php else: ?>
        <div class="table-responsive">
        <table class="table table-primary table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Play</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songs as $song): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($song['title']); ?></td>
                        <td><?php echo htmlspecialchars($song['artist']); ?></td>
                        <td><?php echo htmlspecialchars($song['genre']); ?></td>
                        <td>
                            <audio controls class="w-100">
                                <source src="<?php echo base_url($song['file_path']); ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </td>
                        <td>
                            <a href="<?php echo site_url('edit_song/' . $song['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?php echo site_url('delete_song/' . $song['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this song?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table></div>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>
