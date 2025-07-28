<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Playlist_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function create($user_id, $name)
    {
        $data = array(
            'user_id' => $user_id,
            'name' => $name
        );
        $this->db->insert('playlists', $data);
        return $this->db->insert_id();
    }

    public function get_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_valid', 1);
        $query = $this->db->get('playlists');
        return $query->result_array();
    }

    public function get($id)
    {
        $query = $this->db->get_where('playlists', array('id' => $id, 'is_valid' => 1));
        return $query->row_array();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->set('is_valid', 0);
        $this->db->update('playlists');
    }

    public function add_song($playlist_id, $song_id)
    {
        $data = array(
            'playlist_id' => $playlist_id,
            'song_id' => $song_id
        );
        $this->db->insert('playlist_songs', $data);
    }

    public function get_songs($playlist_id)
    {
        $this->db->select('songs.*, users.username');
        $this->db->from('playlist_songs');
        $this->db->join('songs', 'playlist_songs.song_id = songs.id');
        $this->db->join('users', 'songs.user_id = users.id', 'left');
        $this->db->where('playlist_songs.is_valid', 1);
        $this->db->where('playlist_songs.playlist_id', $playlist_id);
        $this->db->where('songs.is_valid', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function remove_song($playlist_id, $song_id)
    {
        $this->db->where('playlist_id', $playlist_id);
        $this->db->where('song_id', $song_id);
        $this->db->set('is_valid', 0);
        $this->db->update('playlist_songs');
    }
}
