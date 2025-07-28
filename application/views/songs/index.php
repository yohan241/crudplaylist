<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2>All Songs</h2>
    <?php if (empty($songs)): ?>
        <div class="alert alert-info">No songs uploaded yet.</div>
    <?php else: ?>
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Uploaded By</th>
                    <th style=" text-align: center;">Play</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($songs as $song): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($song['title']); ?></td>
                        <td><?php echo htmlspecialchars($song['artist']); ?></td>
                        <td><?php echo htmlspecialchars($song['genre']); ?></td>
                        <td><?php echo htmlspecialchars($song['username']); ?></td>
                        <td style=" text-align: center;">
                            <button class="btn btn-success btn-sm" onclick='window.startPlaylist([{
                                url: "<?php echo base_url($song['file_path']); ?>",
                                title: <?php echo json_encode($song['title']); ?>,
                                artist: <?php echo json_encode($song['artist']); ?>
                            }], 0)'>Play</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>
