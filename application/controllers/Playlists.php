   
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlists extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Playlist_model');
        $this->load->model('Song_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('set_views');
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $playlists = $this->Playlist_model->get_by_user($user_id);
        $playlist_songs = array();
        foreach ($playlists as $playlist) {
            $playlist_songs[$playlist['id']] = $this->Playlist_model->get_songs($playlist['id']);
        }
        
        $data['playlists'] = $playlists;
        $data['playlist_songs'] = $playlist_songs;
        
        
        $this->render($this->set_views->playlists(), $data);
        return;
    }
    
   

    public function create() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name', TRUE);

            $user_id = $this->session->userdata('user_id');
            if (empty($name)) {
                $data['error'] = 'Playlist name is required.';
                $this->render($this->set_views->createplaylist());
                return;
            }
            $playlist_id = $this->Playlist_model->create($user_id, $name);
            if ($playlist_id) {
                redirect('playlists');
            } else {
                $data['error'] = 'Failed to create playlist.';
                $this->render($this->set_views->createplaylist());
            }
        } else {
           
            $this->render($this->set_views->createplaylist());
            return;
        }
    }

    public function delete($id) {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $playlist = $this->Playlist_model->get($id);
        if ($playlist && $playlist['user_id'] == $user_id) {
            $this->Playlist_model->delete($id);
        }
        redirect('playlists');
    }

    public function add_song($playlist_id) {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $playlist = $this->Playlist_model->get($playlist_id);
        if (!$playlist || $playlist['user_id'] != $user_id) {
            show_error('Unauthorized');
        }
        $songs = $this->Song_model->get_all_with_user();
        if ($this->input->method() === 'post') {
            $song_id = $this->input->post('song_id', TRUE);
            if ($song_id) {
                $this->Playlist_model->add_song($playlist_id, $song_id);
                redirect('playlists');
            }
        }
        $data['playlist'] = $playlist;
        $data['songs'] = $songs;
        
        $this->render($this->set_views->addtoplaylist(),$data);

    }
     public function remove_song($playlist_id, $song_id) {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $playlist = $this->Playlist_model->get($playlist_id);
        if ($playlist && $playlist['user_id'] == $user_id) {
            $this->Playlist_model->remove_song($playlist_id, $song_id);
        }
        redirect('playlists');
    }
    public function add_song_dynamic() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    
        $playlist_id = $this->input->post('playlist_id');
        $song_id = $this->input->post('song_id');
    
        if ($playlist_id && $song_id) {
            $playlist = $this->Playlist_model->get($playlist_id);
            $user_id = $this->session->userdata('user_id');
    
            if ($playlist && $playlist['user_id'] == $user_id) {
                $this->Playlist_model->add_song($playlist_id, $song_id);
            }
        }
        redirect('songs');
    }
    
}
