<div class="container mt-3 px-4">
    <h2 class=" mb-3"><i class="bi bi-music-note-beamed  mb-3">&nbsp;My Songs</i></h2>
    <?php if (empty($songs)): ?>

        <div class="alert alert-info">You have not uploaded any songs yet.</div>
        <a href="<?php echo site_url('upload_song'); ?>" class="btn btn-success mb-3">Upload a Song?</a>
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
                            <!-- Desktop buttons -->
                            <a href="<?php echo site_url('edit_song/' . $song['id']); ?>"
                                class="btn btn-warning btn-sm flex-fill d-none d-sm-inline">
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm flex-fill d-none d-sm-inline" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-song-id="<?php echo $song['id']; ?>">
                                Delete
                            </a>

                            <!-- Mobile icons -->
                            <a href="<?php echo site_url('edit_song/' . $song['id']); ?>"
                                class="btn btn-warning btn-sm flex-fill d-inline d-sm-none">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm flex-fill d-inline d-sm-none" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-song-id="<?php echo $song['id']; ?>">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content neo-brutal-window">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel"><i class="bi bi-exclamation-triangle-fill text-danger"></i> Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        Are you sure you want to delete this song?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const deleteModal = document.getElementById('deleteModal');
  const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

  deleteModal.addEventListener('show.bs.modal', function (event) {
    const trigger = event.relatedTarget;
    const songId = trigger.getAttribute('data-song-id');
    const deleteUrl = `<?php echo site_url('delete_song/'); ?>${songId}`;
    confirmDeleteBtn.setAttribute('href', deleteUrl);
  });
});
</script>
