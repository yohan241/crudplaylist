<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Songs extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Song_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('set_views');
        require_once(APPPATH . 'third_party/getid3/getid3.php');
    }

    public function search()
    {
        $q = $this->input->get('q', TRUE);
        $songs = [];
        if ($q) {
            $songs = $this->Song_model->search($q);
        }
        $data['songs'] = $songs;
        $data['search_query'] = $q;

        $this->render($this->set_views->songs(), $data);
    }


    public function upload()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->input->method() === 'post') {
            // Song file upload config
            $config['upload_path'] = './uploads/songs/';
            $config['allowed_types'] = 'mp3|wav|ogg|m4a|flac|aac';
            $config['max_size'] = 10240; // 10MB
            $this->load->library('upload', $config);

            // Upload song file
            if (!$this->upload->do_upload('song_file')) {
                $data['error'] = $this->upload->display_errors();

                $this->render($this->set_views->addsong(), $data);
                return;
            }
            $file_data = $this->upload->data();
            $file_path = 'uploads/songs/' . $file_data['file_name'];

            // Image upload config
            $image_path = null;
            if (!empty($_FILES['song_image']['name'])) {
                $img_config['upload_path'] = './uploads/images/';
                $img_config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                $img_config['max_size'] = 2048; // 2MB
                $this->load->library('upload', $img_config, 'imgupload');
                if ($this->imgupload->do_upload('song_image')) {
                    $img_data = $this->imgupload->data();
                    $image_path = 'uploads/images/' . $img_data['file_name'];
                }
            }

            $title = $this->input->post('title', TRUE);
            $artist = $this->input->post('artist', TRUE);
            $genre = $this->input->post('genre', TRUE);
            $user_id = $this->session->userdata('user_id', TRUE);

            // Update your Song_model->create to accept $image_path
            $this->Song_model->create($user_id, $title, $artist, $genre, $file_path, $image_path);

            $data['success'] = 'Song uploaded successfully!';

            $this->render($this->set_views->songs(), $data);
        } else {

            $this->render($this->set_views->addsong());
        }
    }

    // public function index()
    // {
    //     $CI =& get_instance();
    //     $CI->load->model('Song_model');
    //     $this->load->model('Playlist_model');
    //     $songs = $CI->Song_model->get_all_with_user();
    //     $data['songs'] = $songs;
    //     $user_id = $this->session->userdata('user_id');
    //     $playlists = $this->Playlist_model->get_by_user($user_id);
    //     $playlist_songs = array();
    //     foreach ($playlists as $playlist) {
    //         $playlist_songs[$playlist['id']] = $this->Playlist_model->get_songs($playlist['id']);
    //     }
    //     $data['playlists'] = $playlists;
    //     $data['playlist_songs'] = $playlist_songs;

    //     $this->render($this->set_views->songs(), $data);
    // }
    public function index()
    {
        $this->load->library('pagination');
        $this->load->model('Song_model');
        $this->load->model('Playlist_model');

        // Pagination config
        $config['base_url'] = base_url('songs/index');
        $config['total_rows'] = $this->Song_model->count_all_valid();
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;

        // Bootstrap 5 pagination style (optional)
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['songs'] = $this->Song_model->get_all_with_user($config['per_page'], $page);
        $data['pagination_links'] = $this->pagination->create_links();
        $user_id = $this->session->userdata('user_id');
        $playlists = $this->Playlist_model->get_by_user($user_id);

        $playlist_songs = array();
        foreach ($playlists as $playlist) {
            $playlist_songs[$playlist['id']] = $this->Playlist_model->get_songs($playlist['id']);
        }
        $data['playlists'] = $playlists;
        $data['playlist_songs'] = $playlist_songs;
        $this->render($this->set_views->songs(), $data);
    }

    public function my_songs()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $songs = $this->Song_model->get_by_user($user_id);
        $data['songs'] = $songs;
        $this->render($this->set_views->mysongs(), $data);
    }

    public function edit($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');
        $song = $this->Song_model->get($id);

        if (!$song || $song['user_id'] != $user_id) {
            show_error('Unauthorized');
        }

        if ($this->input->method() === 'post') {
            $title = $this->input->post('title', true);
            $artist = $this->input->post('artist', true);
            $genre = $this->input->post('genre', true);

            $song_image = $song['image_path']; // default to existing image

            // Check if a file was uploaded
            if (!empty($_FILES['song_image']['name'])) {
                $config['upload_path'] = './uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('song_image')) {
                    $upload_data = $this->upload->data();
                    $song_image = 'uploads/images/' . $upload_data['file_name'];
                } else {
                    // You can optionally show error or keep existing image
                    $data['upload_error'] = $this->upload->display_errors();
                }
            }

            // Update the song with or without new image
            $this->Song_model->update($id, $title, $artist, $genre, $song_image);

            redirect('my_songs');
        }

        $data['song'] = $song;

        $this->render($this->set_views->editsong(), $data);
    }

    public function delete($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $song = $this->Song_model->get($id);
        if ($song && $song['user_id'] == $user_id) {
            $this->Song_model->delete($id);
        }
        redirect('my_songs');
    }
}
