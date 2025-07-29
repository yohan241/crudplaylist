<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2 class=" mb-3"><i class="bi bi-music-note-beamed  mb-3">&nbsp;My Songs</i></h2>
    <?php if (empty($songs)): ?>
        <div class="alert alert-info">You have not uploaded any songs yet.</div>
    <?php else: ?>
        <div class="row g-3 mb-5">
            <?php foreach ($songs as $song): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="neo-brutal-window p-3 h-100 d-flex flex-column justify-content-between"
                        style="border-radius:18px;">
                        <div class="d-flex">
                            <div class="imgspace">
                                <?php if (!empty($song['image_path'])): ?>
                                    <img src="<?= base_url($song['image_path']); ?>" class="img-thumbnail me-2"
                                        style="width:78px; height:78px; object-fit:cover;">
                                <?php endif; ?>
                            </div>
                            <div class="song_details">
                                <h5 class="fw-bold mb-1"><?php echo htmlspecialchars($song['title']); ?></h5>
                                <div class="text-muted mb-2"><?php echo htmlspecialchars($song['artist']); ?> &mdash; <span
                                        class="badge bg-secondary"><?php echo htmlspecialchars($song['genre']); ?></span></div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <audio controls class="w-100">
                                <source src="<?php echo base_url($song['file_path']); ?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="<?php echo site_url('edit_song/' . $song['id']); ?>"
                                class="btn btn-warning btn-sm flex-fill">Edit</a>
                            <a href="<?php echo site_url('delete_song/' . $song['id']); ?>"
                                class="btn btn-danger btn-sm flex-fill"
                                onclick="return confirm('Are you sure you want to delete this song?');">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>