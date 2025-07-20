
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="auto">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>CrudPlaylist</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href="https://bootswatch.com/5/brite/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
            
    </head>

    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky bg-primary" data-bs-theme="light">
  <div class="container">
    <a class="navbar-brand" href="#">Playlist</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse show" id="navbarColor01" style="">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= site_url(); ?>">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>songs">Songs</a>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">Account</a>
          <div class="dropdown-menu" data-bs-popper="static">
            <a class="dropdown-item" href="<?= site_url(); ?>my_songs">My Songs</a>
           <a class="dropdown-item" href="<?= site_url(); ?>playlists">My Playlists</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= site_url(); ?>upload_song">Upload Song</a>
            <a class="dropdown-item" href="<?= site_url(); ?>create_playlist">Create Playlist</a>
          </div>
        </li>

      </ul>
      <form class="d-flex me-2">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
      <?php if ($this->session->userdata('user_id')): ?>
        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#userModal">
          <i class="bi bi-person-circle"></i> Account
        </button>
      <?php endif; ?>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Account Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Logged in as <strong><?= isset($username) ? htmlspecialchars($username) : 'User'; ?></strong></p>
      </div>
      <div class="modal-footer">
        <a href="<?= site_url('logout'); ?>" class="btn btn-danger">Sign Out</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    