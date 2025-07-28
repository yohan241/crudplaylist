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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Mega:wght@100..900&display=swap" rel="stylesheet">

</head>

<body>

  <div class="container  bg-white h-100 border border-dark position-absolute start-50 translate-middle-x z-n1  border-top-0 shadowy position-fixed"> </div>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  bg-primary" data-bs-theme="light">
    <div class="container">
      <a class="navbar-brand lexend-mega-hi " href="<?= base_url()?>"><img src="<?= base_url('assets/images/logo.png'); ?>"> </a>
      <a class="navbar-brand lexend-mega-hi" href="<?= base_url()?>">PlayUs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
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
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
              aria-expanded="true">Account</a>
            <div class="dropdown-menu" data-bs-popper="static">
              <?php if ($this->session->userdata('user_id')): ?>
                <span class="dropdown-item text-muted">Logged in as
                  <strong><?= $this->session->userdata('username') ? htmlspecialchars($this->session->userdata('username')) : 'User'; ?></strong></span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url(); ?>my_songs">My Songs</a>
                <a class="dropdown-item" href="<?= site_url(); ?>playlists">My Playlists</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url(); ?>upload_song">Upload Song</a>
                <a class="dropdown-item" href="<?= site_url(); ?>create_playlist">Create Playlist</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="<?= site_url('logout'); ?>" id="signOutBtn">Sign Out</a>
              <?php else: ?>
                <a class="dropdown-item text-primary-emphasis" href="<?= site_url('login'); ?>">
                  <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
              <?php endif; ?>
            </div>
          </li>

        </ul>
        <form class="d-flex me-2" method="get" action="<?= site_url('songs/search'); ?>">
          <input class="form-control me-sm-2" type="search" name="q" placeholder="Search songs..." value="<?= isset($search_query) ? htmlspecialchars($search_query) : '' ?>">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <script>
document.addEventListener('DOMContentLoaded', function() {
  var signOutBtn = document.getElementById('signOutBtn');
  if (signOutBtn) {
    signOutBtn.addEventListener('click', function(e) {
      if (!confirm('Are you sure you want to sign out?')) {
        e.preventDefault();
      }
    });
  }
});
</script>
