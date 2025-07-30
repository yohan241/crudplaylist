<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('set_views');
    }

    public function register() {
        if ($this->input->method() === 'post') {
            // Custom error messages
            $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|min_length[3]|max_length[20]|is_unique[users.username]', array(
                'required' => 'Username is required.',
                'alpha_numeric' => 'Username can only contain letters and numbers.',
                'min_length' => 'Username must be at least 3 characters.',
                'max_length' => 'Username cannot exceed 20 characters.',
                'is_unique' => 'This username is already taken.'
            ));
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', array(
                'required' => 'Email is required.',
                'valid_email' => 'Please enter a valid email address.',
                'is_unique' => 'This email is already in use.'
            ));
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]', array(
                'required' => 'Password is required.',
                'min_length' => 'Password must be at least 6 characters.'
            ));
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]', array(
                'required' => 'Please confirm your password.',
                'matches' => 'Passwords do not match.'
            ));

            if ($this->form_validation->run() === FALSE) {
                $data['error'] = validation_errors();

                $this->render($this->set_views->register(), $data);
                return;
            }

            $username = $this->input->post('username', TRUE);
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            $user_id = $this->User_model->create($username, $email, $password);
            if ($user_id) {
                $this->session->set_userdata('user_id', $user_id);
                redirect('login');
            } else {
                $data['error'] = 'Registration failed.';
                $this->render($this->set_views->register(), $data);
            }
        } else {
            $this->render($this->set_views->register());
        }
    }

    public function login() {
        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required', array(
                'required' => 'Username is required.'
            ));
            $this->form_validation->set_rules('password', 'Password', 'required', array(
                'required' => 'Password is required.'
            ));

            if ($this->form_validation->run() === FALSE) {
                $data['error'] = '';
                if (form_error('username')) {
                    $data['error'] .= form_error('username');
                }
                if (form_error('password')) {
                    $data['error'] .= form_error('password');
                }
                $this->render($this->set_views->login(), $data);
                return;
            }

            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password',  TRUE);
            $user = $this->User_model->get_by_username($username);
            if ($user && password_verify($password, $user['password_hash'])) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('username', $username);
                redirect('pages/view');
            } else {
                $data['error'] = 'Invalid username or password.';
                $this->render($this->set_views->login(), $data);
            }
        } else {
            $this->render($this->set_views->login());
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('');
    }
}
