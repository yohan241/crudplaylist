   
  
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Song_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($user_id, $title, $artist, $genre, $file_path) {
        $data = array(
            'user_id' => $user_id,
            'title' => $title,
            'artist' => $artist,
            'genre' => $genre,
            'file_path' => $file_path
        );
        $this->db->insert('songs', $data);
        return $this->db->insert_id();
    }

    public function get_all_with_user() {
        $this->db->select('songs.*, users.username');
        $this->db->from('songs');
        $this->db->join('users', 'songs.user_id = users.id', 'left');
        $this->db->where('songs.is_valid', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_valid', 1);
        $query = $this->db->get('songs');
        return $query->result_array();
    }

    public function get($id) {
        $query = $this->db->get_where('songs', array('id' => $id, 'is_valid' => 1));
        return $query->row_array();
    }

    public function update($id, $title, $artist, $genre) {
        $data = array(
            'title' => $title,
            'artist' => $artist,
            'genre' => $genre
        );
        $this->db->where('id', $id);
        $this->db->update('songs', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->set('is_valid', 0);
        $this->db->update('songs');
    }

     public function search($query) {
        $this->db->select('songs.*, users.username');
        $this->db->from('songs');
        $this->db->join('users', 'songs.user_id = users.id', 'left');
        $this->db->where('songs.is_valid', 1);
        $this->db->group_start();
        $this->db->like('songs.title', $query);
        $this->db->or_like('songs.artist', $query);
        $this->db->or_like('songs.genre', $query);
        $this->db->group_end();
        $result = $this->db->get()->result_array();
        return $result;
    }
}
