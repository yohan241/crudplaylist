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


    <div class="dashboard-box">
      <div class="row my-5 ">
        <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
          <h4> Welcome to</h4>
          <h1 class="display-4 fw-bold mb-3 text-decoration-underline"> Play<span class="text-primary">Us,</span></h1>
          <h1>
            <strong><?= $this->session->userdata('username') ? htmlspecialchars($this->session->userdata('username')) : 'User'; ?></strong>!
          </h1>
          <p class="lead">What would you like to do today?</p>
        </div>
      </div>

      <div class="dashboard-scroll-wrapper">
      <div class="dashboard-actions">
        <a href="<?= site_url('upload_song'); ?>" class="text-decoration-none text-dark">
          <div class="dash-card">
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <h4>Upload Song</h4>
          </div>
        </a>
        <a href="<?= site_url('my_songs'); ?>" class="text-decoration-none text-dark ">
          <div class="dash-card">
            <i class="bi bi-music-note-beamed"></i>
            <h4>My Songs</h4>
          </div>
        </a>
        <a href="<?= site_url('playlists'); ?>" class="text-decoration-none text-dark">
          <div class="dash-card">
            <i class="bi bi-list-ul"></i>
            <h4>My Playlists</h4>
          </div>
        </a>
        <a href="<?= site_url('songs'); ?>" class="text-decoration-none text-dark">
          <div class="dash-card">
            <i class="bi bi-binoculars"></i>
            <h4>Explore Music</h4>
          </div>
        </a>
      </div>
    </div>
      <div class="dash-footer">
        <small>🎵 Keep creating. Keep exploring. PlayUs is yours.</small>
      </div>
    </div>
    <!-- WHEN NOT REGISTERED -->

  <?php else: ?>
    <!-- Modern Hero Section -->
    <div class="row my-5 justify-content-center">

      <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
        <img src="<?= base_url('assets/images/logoLg.png'); ?>" alt="PlayUs Logo"
          style="width:5vw;box-shadow:0 8px 32px #a5db4e55;" class="mb-4">
        <h1 class="display-2 fw-bold mb-3 text-decoration-underline lexend-mega-hi"> Play<span class="text-primary">Us</span></h1>
        <p class="lead mb-4" style="font-size:1.35rem; color:#222;">A creative music platform for sharing, discovering,
          and curating your own playlists. Join a vibrant community of music lovers and creators.</p>
        <a href="<?= site_url('register'); ?>" class="btn btn-lg neo-brutal-btn shadowy px-5 py-3 mb-2"
          style="font-size:1.2rem;">Register Now to Enjoy the Experience!</a>

      </div>
    </div>

    <!-- Features Section -->
    <div class="row g-4 justify-content-center mt-4">
      <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="neo-brutal-window flex-fill text-center p-4" style="border-radius:24px;">
          <div class="neo-brutal-title" style="font-size:1.3rem;"><i
              class="bi bi-cloud-arrow-up neo-brutal-icon"></i>Upload Your Music</div>
          <p>Share your original tracks with the world. MP3, WAV, and OGG supported.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="neo-brutal-window flex-fill text-center p-4" style="border-radius:24px;">
          <div class="neo-brutal-title" style="font-size:1.3rem;"><i
              class="bi bi-music-note-list neo-brutal-icon"></i>Create Playlists</div>
          <p>Build and manage custom playlists from your favorite songs.</p>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-flex">
        <div class="neo-brutal-window flex-fill text-center p-4" style="border-radius:24px;">
          <div class="neo-brutal-title" style="font-size:1.3rem;"><i class="bi bi-search neo-brutal-icon"></i>Discover &
            Search</div>
          <p>Find new music from the community and add it to your playlists.</p>
        </div>
      </div>
    </div>
  <?php endif; ?>


</div>

<style>
  .dashboard-box {
    background: #fff;
    border: 4px solid #222;
    border-radius: 24px;
    box-shadow: 8px 8px 0 #222;
    max-width: 1200px;
    margin: 3rem auto;
    margin-top: 0%;
    margin-bottom: 0%;
    text-align: center;
    height: 80%;
  }

  .dashboard-box h2 {
    font-size: 2.5rem;
    font-weight: bold;
  }

  .dashboard-actions {
    margin-top: 2rem;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
  }

  .dash-card {
    background: #e7e7e7;
    border: 4px solid #222;
    box-shadow: 6px 6px 0 #222;
    border-radius: 20px;
    padding: 1.5rem 1rem;
    width: 220px;
    cursor: pointer;
    transition: 0.1s ease-in-out;
    text-align: center;
  }

  .dash-card:hover {
    transform: translate(-5px,-5px);
    box-shadow: 8px 8px 0 #222;
    background: conic-gradient(#75c1d4 90deg,
        #68b5cf 90deg 180deg,
        #75c1d4 180deg 270deg,
        #68b5cf 270deg);
    background-repeat: repeat;
    background-size: 60px 60px;

    animation: scrollBackground 4s linear infinite;
  }

  .dash-card i {
    font-size: 2rem;
    margin-bottom: 0.75rem;
  }

  .dash-card h4 {
    font-size: 1.2rem;
    font-weight: 600;
  }

  .dash-footer {
    margin-top: 4rem;
    font-size: 0.9rem;
    color: #666;
  }

  @media (max-width: 768px) {
  .dashboard-actions {
    flex-wrap: nowrap;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    scroll-snap-type: x mandatory;
    gap: 1rem;
    padding-bottom: 1rem;
    padding: 0 2rem 1rem; 
  }

  .dash-card {
    flex: 0 0 auto;
    width: 200px;
    border-radius: 1rem;
    background: #eee;
    padding: 1rem;
    box-shadow: 4px 4px 0px black;
  }

  /* Optional: Tidy up the scrollbar */
  .dashboard-actions::-webkit-scrollbar {
    height: 8px;
  }

  .dashboard-actions::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
  }

  .dashboard-actions::-webkit-scrollbar-track {
    background: #f0f0f0;
  }
}

</style>

<body>