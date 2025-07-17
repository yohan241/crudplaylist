   
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlists extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Playlist_model');
        $this->load->model('Song_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
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
        $this->load->view('playlists/index', $data);
    }

    public function create() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->input->method() === 'post') {
            $name = $this->input->post('name');
            $user_id = $this->session->userdata('user_id');
            if (empty($name)) {
                $data['error'] = 'Playlist name is required.';
                $this->load->view('playlists/create', $data);
                return;
            }
            $playlist_id = $this->Playlist_model->create($user_id, $name);
            if ($playlist_id) {
                redirect('playlists');
            } else {
                $data['error'] = 'Failed to create playlist.';
                $this->load->view('playlists/create', $data);
            }
        } else {
            $this->load->view('playlists/create');
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
            $song_id = $this->input->post('song_id');
            if ($song_id) {
                $this->Playlist_model->add_song($playlist_id, $song_id);
                redirect('playlists');
            }
        }
        $data['playlist'] = $playlist;
        $data['songs'] = $songs;
        $this->load->view('playlists/add_song', $data);

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
}
