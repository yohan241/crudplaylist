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

  <div
    class="container  bg-white h-100 border border-dark position-absolute start-50 translate-middle-x z-n1  border-top-0 shadowy position-fixed">

  </div>
  <!-- Navbar -->

  <?php if ($this->session->userdata('user_id')): ?>
    <nav class="navbar navbar-expand-md  bg-primary sticky-top " data-bs-theme="light">
      <div class="container">
        <a class="navbar-brand lexend-mega-hi " href="<?= base_url() ?>"><img
            src="<?= base_url('assets/images/logo.png'); ?>"> </a>
        <a class="navbar-brand lexend-mega-hi" href="<?= base_url() ?>">PlayUs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse " id="navbarColor01" style="">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= site_url(); ?>">Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url(); ?>songs">Recent Songs</a>
            </li>
            <li class="nav-item py-2 py-lg-1 col-12 col-md-auto">
              <div class="vr d-none d-md-flex h-100 mx-md-2 text-black"></div>
              <hr class="d-md-none my-2 text-black-50">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url(); ?>playlists">My Playlist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= site_url(); ?>my_songs">My Songs</a>
            </li>
            <li class="nav-item py-2 py-lg-1 col-12 col-md-auto">
              <div class="vr d-none d-md-flex h-100 mx-md-2 text-black"></div>
              <hr class="d-md-none my-2 text-black-50">
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true">Create</a>
              <div class="dropdown-menu" data-bs-popper="static">
                <?php if ($this->session->userdata('user_id')): ?>
                  <span class="dropdown-item text-muted">Logged in as
                    <strong><?= $this->session->userdata('username') ? htmlspecialchars($this->session->userdata('username')) : 'User'; ?></strong></span>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= site_url(); ?>upload_song">Upload Your Song</a>
                  <a class="dropdown-item" href="<?= site_url(); ?>create_playlist">Create a Playlist</a>

                <?php else: ?>
                  <a class="dropdown-item text-primary-emphasis" href="<?= site_url('login'); ?>">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                  </a>
                <?php endif; ?>
              </div>
            </li>

          </ul>
          <form class="d-flex me-2" method="get" action="<?= site_url('songs/search'); ?>">
            <input class="form-control" type="search" name="q" placeholder="Find songs, artists..."
              value="<?= isset($search_query) ? htmlspecialchars($search_query) : '' ?>">

            <button class="btn btn-secondary text-black rounded-end-pill px-3" type="submit">
              <i class="bi bi-arrow-right"></i>
            </button>
          </form>

            <div class="d-flex flex-column flex-md-row align-items-center gap-2 ms-2">

              <div class="d-none d-md-block vr mx-2 text-black"></div>
              <hr class="d-md-none w-100 my-1 text-black-50">

          
              <button class="btn btn-danger d-none d-md-inline-flex align-items-center" data-bs-toggle="modal"
                data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
              </button>

              <button class="btn btn-danger d-inline d-md-none" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Logout
              </button>
            </div>

        </div>
      </div>
    </nav>


  <?php else: ?>
    <nav class="navbar navbar-expand-md sticky-top bg-primary" data-bs-theme="light">
      <div class="container">
        <a class="navbar-brand lexend-mega-hi " href="<?= base_url() ?>"><img
            src="<?= base_url('assets/images/logo.png'); ?>"> </a>
        <a class="navbar-brand lexend-mega-hi" href="<?= base_url() ?>">PlayUs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
          aria-controls="navbarColor01" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse " id="navbarColor01" style="">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="<?= site_url(); ?>">Home
                <span class="visually-hidden">(current)</span>
              </a>
            </li>

          </ul>
          <div class="d-flex me-2">

            <a class="btn btn-success" data-toggle="tooltip" data-html="true"
              title="<em>Tooltip</em> <u>with</u> <b>HTML</b>" href="<?= site_url('login'); ?>"><i
                class="bi bi-box-arrow-in-right"></i> Login</a>
          </div>
        </div>
      </div>
    </nav>




  <?php endif; ?>

  <!-- End Navbar -->
  <!-- Logout Confirmation Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-dark">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to log out?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="<?= site_url('logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
      </div>
    </div>
  </div>





  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var signOutBtn = document.getElementById('signOutBtn');
      if (signOutBtn) {
        signOutBtn.addEventListener('click', function (e) {
          if (!confirm('Are you sure you want to sign out?')) {
            e.preventDefault();
          }
        });
      }
    });
  </script>