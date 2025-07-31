 

<div class="container mt-5 px-5">
<div class="formpage">
    <h2>Upload Song</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
  
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('upload_song'); ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="song_image" class="form-label">Song Image (optional)</label>
            <input type="file" class="form-control" id="song_image" name="song_image" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" id="genre" name="genre" required>
                <option value="">Select genre</option>
                <option>Pop</option>
                <option>Rock</option>
                <option>Hip Hop</option>
                <option>R&B</option>
                <option>Country</option>
                <option>Electronic</option>
                <option>Jazz</option>
                <option>Classical</option>
                <option>Blues</option>
                <option>Reggae</option>
                <option>Folk</option>
                <option>Soul</option>
                <option>Metal</option>
                <option>Punk</option>
                <option>Alternative</option>
                <option>Indie</option>
                <option>Funk</option>
                <option>Gospel</option>
                <option>World</option>
                <option>Latin</option>
                <option>Dance</option>
                <option>EDM</option>
                <option>House</option>
                <option>Techno</option>
                <option>Trance</option>
                <option>Ambient</option>
                <option>Experimental</option>
                <option>Soundtrack</option>
                <option>Instrumental</option>
                <option>Lo-fi</option>
                <option>Chill</option>
                <option>K-Pop</option>
                <option>Synthpop</option>
                <option>Electropop</option>
                <option>Dance-pop</option>
                <option>Bubblegum Pop</option>
                <option>Teen Pop</option>
                <option>J-Pop</option>
                <option>Indie Pop</option>
                <option>Hard Rock</option>
                <option>Classic Rock</option>
                <option>Psychedelic Rock</option>
                <option>Punk Rock</option>
                <option>Garage Rock</option>
                <option>Soft Rock</option>
                <option>Glam Rock</option>
                <option>Grunge</option>
                <option>Southern Rock</option>
                <option>Math Rock</option>
                <option>Progressive Rock</option>
                <option>Space Rock</option>
                <option>East Coast</option>
                <option>West Coast</option>
                <option>Trap</option>
                <option>Boom Bap</option>
                <option>Drill</option>
                <option>Conscious Rap</option>
                <option>Gangsta Rap</option>
                <option>Old School Hip Hop</option>
                <option>Freestyle Rap</option>
                <option>Lofi Hip Hop</option>
                <option>Alternative Hip Hop</option>
                <option>Bebop</option>
                <option>Swing</option>
                <option>Smooth Jazz</option>
                <option>Acid Jazz</option>
                <option>Free Jazz</option>
                <option>Jazz Fusion</option>
                <option>Latin Jazz</option>
                <option>Ragtime</option>
                <option>Baroque</option>
                <option>Romantic</option>
                <option>Modern Classical</option>
                <option>Opera</option>
                <option>Symphony</option>
                <option>Chamber Music</option>
                <option>Choral</option>
                <option>Electro</option>
                <option>Deep House</option>
                <option>Tech House</option>
                <option>Progressive House</option>
                <option>Drum & Bass</option>
                <option>Dubstep</option>
                <option>Chillstep</option>
                <option>Future Bass</option>
                <option>Glitch</option>
                <option>IDM</option>
                <option>Heavy Metal</option>
                <option>Death Metal</option>
                <option>Black Metal</option>
                <option>Doom Metal</option>
                <option>Thrash Metal</option>
                <option>Power Metal</option>
                <option>Symphonic Metal</option>
                <option>Nu Metal</option>
                <option>Metalcore</option>
                <option>Indie Rock</option>
                <option>Emo</option>
                <option>Shoegaze</option>
                <option>Dream Pop</option>
                <option>Post-Rock</option>
                <option>Noise Pop</option>
                <option>Bedroom Pop</option>
                <option>Americana</option>
                <option>Celtic</option>
                <option>Bluegrass</option>
                <option>Singer-Songwriter</option>
                <option>Indie Folk</option>
                <option>Neofolk</option>
                <option>Afrobeat</option>
                <option>Klezmer</option>
                <option>Bossa Nova</option>
                <option>Flamenco</option>
                <option>Bollywood</option>
                <option>Reggaeton</option>
                <option>Cumbia</option>
                <option>Gqom</option>
                <option>Balkan</option>
                <option>Eurodance</option>
                <option>Dancehall</option>
                <option>Disco</option>
                <option>Breakbeat</option>
                <option>Big Room</option>
                <option>Moombahton</option>
                <option>Jersey Club</option>
                <option>Chillhop</option>
                <option>Downtempo</option>
                <option>Ambient House</option>
                <option>New Age</option>
                <option>Meditation</option>
                <option>Nature Sounds</option>
                <option>Neo Soul</option>
                <option>Motown</option>
                <option>Contemporary R&B</option>
                <option>Quiet Storm</option>
                <option>Musical Theater</option>
                <option>Video Game Music</option>
                <option>Anime OST</option>
                <option>Vaporwave</option>
                <option>Synthwave</option>
                <option>Chiptune</option>
                <option>Mashup</option>
                <option>Parody</option>
                <option>Spoken Word</option>
                <option>Podcast</option>
                <option>Other</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="song_file" class="form-label">Song File</label>
            <input type="file" class="form-control" id="song_file" name="song_file" accept=".mp3,.wav,.ogg" required>
        </div>
        <div class="btn-group text-right" role="group">
        <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
</div></div>
 