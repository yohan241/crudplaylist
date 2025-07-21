
<style>
.neo-brutal-window {
  background: #fff;
  border: 4px solid #222;
  border-radius: 18px 18px 0 0;
  box-shadow: 8px 8px 0 #222;
  margin-bottom: 2rem;
  padding: 2rem 1.5rem 1.5rem 1.5rem;
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
  <div class="row mb-5">
    <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
      <h1 class="display-4 fw-bold mb-3">Welcome to PlayUs</h1>
      <p class="lead">A simple platform to upload your own music, create and manage playlists, and discover songs from the community. Sign up, share your tracks, and build your music world!</p>
    </div>
  </div>
  <div class="row g-4 justify-content-center">
    <div class="col-12 col-md-6 col-lg-5 col-xl-4 d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-person-plus neo-brutal-icon"></i>Sign Up & Login</div>
        <p>Create your own account to upload music, manage your playlists, and connect with other users.</p>
        <a href="<?= site_url('register'); ?>" class="neo-brutal-btn btn">Get Started</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5 col-xl-4 d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-cloud-arrow-up neo-brutal-icon"></i>Upload Songs</div>
        <p>Share your music with the world! Upload your own songs in MP3, WAV, or OGG format.</p>
        <a href="<?= site_url('upload_song'); ?>" class="neo-brutal-btn btn">Upload Now</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5 col-xl-4 d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-music-note-list neo-brutal-icon"></i>Create & Manage Playlists</div>
        <p>Build custom playlists from your favorite songs. Add, remove, and organize tracks easily.</p>
        <a href="<?= site_url('playlists'); ?>" class="neo-brutal-btn btn">View Playlists</a>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-5 col-xl-4 d-flex">
      <div class="neo-brutal-window flex-fill">
        <div class="neo-brutal-title"><i class="bi bi-search neo-brutal-icon"></i>Discover & Search</div>
        <p>Browse and search for songs uploaded by the community. Find new music and add it to your playlists.</p>
        <a href="<?= site_url('songs'); ?>" class="neo-brutal-btn btn">Explore Songs</a>
      </div>
    </div>
  </div>
</div>
