<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Songs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Song_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function search()
    {
        $q = $this->input->get('q');
        $songs = [];
        if ($q) {
            $songs = $this->Song_model->search($q);
        }
        $data['songs'] = $songs;
        $data['search_query'] = $q;
        $this->load->view('songs/index', $data);
    }


    public function upload()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        if ($this->input->method() === 'post') {
            $config['upload_path'] = './uploads/songs/';
            $config['allowed_types'] = 'mp3|wav|ogg';
            $config['max_size'] = 10240; // 10MB
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('song_file')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('songs/upload', $data);
                return;
            }
            $file_data = $this->upload->data();
            $title = $this->input->post('title');
            $artist = $this->input->post('artist');
            $genre = $this->input->post('genre');
            $user_id = $this->session->userdata('user_id');
            $file_path = 'uploads/songs/' . $file_data['file_name'];
            $this->Song_model->create($user_id, $title, $artist, $genre, $file_path);
            $data['success'] = 'Song uploaded successfully!';
            $this->load->view('songs/upload', $data);
        } else {
            $this->load->view('songs/upload');
        }
    }

    public function index()
    {
        $CI =& get_instance();
        $CI->load->model('Song_model');
        $songs = $CI->Song_model->get_all_with_user();
        $data['songs'] = $songs;
        $this->load->view('songs/index', $data);
    }
    public function my_songs()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        $songs = $this->Song_model->get_by_user($user_id);
        $data['songs'] = $songs;
        $this->load->view('songs/my_songs', $data);
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
            $title = $this->input->post('title');
            $artist = $this->input->post('artist');
            $genre = $this->input->post('genre');
            $this->Song_model->update($id, $title, $artist, $genre);
            redirect('my_songs');
        }
        $data['song'] = $song;
        $this->load->view('songs/edit', $data);
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
