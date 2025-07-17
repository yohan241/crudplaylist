
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="auto">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>CrudPlaylist</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href="https://bootswatch.com/5/brite/bootstrap.min.css" rel="stylesheet">
       
            
    </head>

    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed bg-primary" data-bs-theme="light">
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
          <a class="nav-link" href="<?= site_url(); ?>create_playlist">Create Playlist</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>upload_song">Upload Song</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>songs">Songs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>playlists">Playlists</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url(); ?>my_songs">My Songs</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Playlist</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- End Navbar -->
    