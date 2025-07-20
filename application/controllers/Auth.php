<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');

        $this->load->helper(array('form', 'url'));
       
    }

    public function register() {
        
        if ($this->input->method() === 'post') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirm = $this->input->post('confirm_password');

            if ($password !== $confirm) {
                $data['error'] = 'Passwords do not match.';
                   $this->load->view('auth/register', $data);
                return;
            }

            if ($this->User_model->get_by_username($username)) {
                $data['error'] = 'Username already exists.';
                $this->load->view('auth/register', $data);
                return;
            }
            if ($this->User_model->get_by_email($email)) {
                $data['error'] = 'Email is already in use.';
                $this->load->view('auth/register', $data);
                return;
            }

            $user_id = $this->User_model->create($username, $email, $password);
            if ($user_id) {
                $this->session->set_userdata('user_id', $user_id);
                redirect('login');
            } else {
                $data['error'] = 'Registration failed.';
                $this->load->view('auth/register', $data);
            }
        } else {
            $this->load->view('auth/register');
        }
    }

    public function login() {
        if ($this->input->method() === 'post') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->get_by_username($username);
            if ($user && password_verify($password, $user['password_hash'])) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('pages/view');
            } else {
                $data['error'] = 'Invalid username or password.';
                $this->load->view('auth/login', $data);
            }
        } else {
            $this->load->view('auth/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
