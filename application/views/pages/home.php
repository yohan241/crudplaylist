<style>
  .neo-brutal-window {
    background: #fff;
    border: 4px solid #222;
    border-radius: 18px 18px 0 0;
    box-shadow: 8px 8px 0 #222;
    margin-bottom: 2rem;
    padding: 1.5rem 1.5rem 1.5rem 1.5rem;
    position: relative;
    max-width: 500px;
  }

  .neo-brutal-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #222;
    margin-bottom: 1rem;
    letter-spacing: 1px;
  }

  .neo-brutal-icon {
    font-size: 2rem;
    margin-right: 0.5rem;
  }

  .neo-brutal-btn {
    background: #a5db4e;
    border: 2px solid #222;
    color: #222;
    font-weight: bold;
    border-radius: 8px;
    box-shadow: 3px 3px 0 #222;
    transition: 0.1s;
  }

  .neo-brutal-btn:hover {
    background: #94d231;
    color: #fff;
    box-shadow: 1px 1px 0 #222;
  }

  .neo-brutal-container {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
    align-items: flex-start;
    margin-top: 3rem;
  }
</style>


<div class="container py-5">
  

  <?php if ($this->session->userdata('user_id')): ?>
   <div class="row mb-5 ">
    <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
      <h1 class="display-4 fw-bold mb-3">Welcome to PlayUs, <strong><?= $this->session->userdata('username') ? htmlspecialchars($this->session->userdata('username')) : 'User'; ?></strong>!</h1>
      <p class="lead">You can start listening to songs, create playlists, and share your music to the others in the world!</p>
    </div>
  </div>
   <div class="row g-4 justify-content-center row-cols-2">
    
    <div class="col-12 col-md-6 col-lg-5  d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-cloud-arrow-up neo-brutal-icon"></i>Upload Songs</div>
        <p>Share your music with the world! Upload your own songs in MP3, WAV, or OGG format.</p>
        <a href="<?= site_url('upload_song'); ?>" class="neo-brutal-btn btn">Upload Now</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5  d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-music-note-list neo-brutal-icon"></i>Create & Manage Playlists
        </div>
        <p>Build custom playlists from your favorite songs. Add, remove, and organize tracks easily.</p>
        <a href="<?= site_url('playlists'); ?>" class="neo-brutal-btn btn">View Playlists</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5  d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-search neo-brutal-icon"></i>Discover & Search</div>
        <p>Browse and search for songs uploaded by the community. Find new music and add it to your playlists.</p>
        <a href="<?= site_url('songs'); ?>" class="neo-brutal-btn btn">Explore Songs</a>
      </div>
    </div>
  </div>
  
  <!-- WHEN NOT REGISTERED -->

  <?php else: ?>
    <!-- Modern Hero Section -->
    <div class="row mb-5 justify-content-center">
      <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
        <img src="<?= base_url('assets/images/logo.png'); ?>" alt="PlayUs Logo" style="max-width:120px; border-radius:24px; box-shadow:0 8px 32px #a5db4e55;" class="mb-4">
        <h1 class="display-2 fw-bold mb-3 lexend-mega-hi" style="letter-spacing:1px;">PlayUs</h1>
        <p class="lead mb-4" style="font-size:1.35rem; color:#222;">A creative music platform for sharing, discovering, and curating your own playlists. Join a vibrant community of music lovers and creators.</p>
        <a href="<?= site_url('register'); ?>" class="btn btn-lg neo-brutal-btn shadowy px-5 py-3 mb-2" style="font-size:1.2rem;">Get Started Free</a>
        <div class="mt-3">
          <a href="<?= site_url('songs'); ?>" class="btn btn-outline-dark btn-lg neo-brutal-btn px-4 py-2">Explore Songs Without Registering</a>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div class="row g-4 justify-content-center mt-4">
      <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="neo-brutal-window flex-fill text-center p-4" style="border-radius:24px;">
          <div class="neo-brutal-title" style="font-size:1.3rem;"><i class="bi bi-cloud-arrow-up neo-brutal-icon"></i>Upload Your Music</div>
          <p>Share your original tracks with the world. MP3, WAV, and OGG supported.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="neo-brutal-window flex-fill text-center p-4" style="border-radius:24px;">
          <div class="neo-brutal-title" style="font-size:1.3rem;"><i class="bi bi-music-note-list neo-brutal-icon"></i>Create Playlists</div>
          <p>Build and manage custom playlists from your favorite songs.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="neo-brutal-window flex-fill text-center p-4" style="border-radius:24px;">
          <div class="neo-brutal-title" style="font-size:1.3rem;"><i class="bi bi-search neo-brutal-icon"></i>Discover & Search</div>
          <p>Find new music from the community and add it to your playlists.</p>
        </div>
      </div>
    </div>
  <?php endif; ?>

 
</div>