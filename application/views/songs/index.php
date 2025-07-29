<?php $this->load->view('templates/header'); ?>
<div class="container mt-3 px-4">
    <h2 class=" mb-3"><i class="bi bi-music-note-beamed "> &nbsp;All Songs</i></h2>
    <?php if (empty($songs)): ?>
        <div class="alert alert-info">Uh Oh, no songs are present :<</div>
    <?php else: ?>
        <div class="row g-3 mb-5">
            <?php foreach ($songs as $song): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="neo-brutal-window p-3 h-100 d-flex flex-row justify-content-between align-items-center"
                        style="border-radius:18px;">
                        <!-- Top Part -->
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
                                <div class="mb-2"><span class="badge bg-info text-dark">Uploaded by
                                        <?php echo htmlspecialchars($song['username']); ?></span></div>
                            </div>
                        </div>
                        <!-- Audio Player -->
                        <div class=" text-center">
                            <button class="btn btn-success btn-sm" style="    border-radius: 30px; height: 40px;" onclick='window.startPlaylist([{
                                url: "<?php echo base_url($song['file_path']); ?>",
                                title: <?php echo json_encode($song['title']); ?>,
                                artist: <?php echo json_encode($song['artist']); ?>
                            }], 0)'><i class="bi bi-play-circle-fill icon-outline fa-10x"></i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<?php $this->load->view('templates/footer'); ?>