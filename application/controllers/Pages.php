<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('set_views');
        $this->load->database('default');
    }
    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);

      

        $this->render($this->set_views->home(), $data);

        // $this->load->view('templates/header');
        // $this->load->view('pages/' . $page, $data);
        // $this->load->view('templates/footer');

    }
}