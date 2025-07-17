<?php $this->load->view('templates/header'); ?>
<div class="container mt-5">
    <h2>All Songs</h2>
    <?php if (empty($songs)): ?>
        <div class="alert alert-info">No songs uploaded yet.</div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Uploaded By</th>
                    <th>Play</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songs as $song): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($song['title']); ?></td>
                        <td><?php echo htmlspecialchars($song['artist']); ?></td>
                        <td><?php echo htmlspecialchars($song['genre']); ?></td>
                        <td><?php echo htmlspecialchars($song['username']); ?></td>
                        <td>
                            <audio controls>
                                <source src="<?php echo base_url($song['file_path']); ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>
