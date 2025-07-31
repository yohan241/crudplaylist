   
  
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Song_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($user_id, $title, $artist, $genre, $file_path, $image_path = null) {
        $data = array(
            'user_id' => $user_id,
            'title' => $title,
            'artist' => $artist,
            'genre' => $genre,
            'file_path' => $file_path,
            'image_path' => $image_path
        );
        $this->db->insert('songs', $data);
        return $this->db->insert_id();
    }

    // GET EVERYTHING
    public function get_all_with_user($limit = 0, $offset = 0) {
        $this->db->select('songs.*, users.username');
        $this->db->from('songs');
        $this->db->join('users', 'songs.user_id = users.id', 'left');
        $this->db->where('songs.is_valid', 1);
        $this->db->order_by("songs.id", "desc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
}

    public function count_all_valid() {
        $this->db->where('is_valid', 1);
        return $this->db->count_all_results('songs');
    }

    //SEARCH BY USER
    public function get_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_valid', 1);
        $this->db->order_by("id", "desc");
        $query = $this->db->get('songs');
        return $query->result_array();
    }

    //GET BY ID
    public function get($id) {
        $query = $this->db->get_where('songs', array('id' => $id, 'is_valid' => 1));
        return $query->row_array();
    }

    public function update($id, $title, $artist, $genre, $image_path)
    {
        $data = [
            'title' => $title,
            'artist' => $artist,
            'genre' => $genre,
            'image_path' => $image_path
        ];
    
        $this->db->where('id', $id);
        return $this->db->update('songs', $data);
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
        $this->db->order_by("songs.id", "desc");
        $result = $this->db->get()->result_array();
        return $result;
    }
}
