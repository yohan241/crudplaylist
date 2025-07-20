<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($username, $email, $password) {
        $data = array(
            'username' => $username,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT)
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function get_by_username($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row_array();
    }

    public function get_by_email($email) {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row_array();
    }
}
