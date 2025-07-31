<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data = [];
    }

    public function render($middle, $data=[])
    {

        // echo print_r($data, true);exit;
        $this->data['header'] = $this->load->view('templates/header', $data, true);
        $this->data['body'] = $this->load->view($middle, $data, TRUE);
        $this->data['footer'] = $this->load->view('templates/footer', $data, true);

        $this->load->view('templates/skeleton', $this->data);
        return;
    }
    public function renderwithoutheader($middle, $data=[])
    {

        // echo print_r($data, true);exit;
        
        $this->data['body'] = $this->load->view($middle, $data, TRUE);
        $this->data['footer'] = $this->load->view('templates/footer', $data, true);

        $this->load->view('templates/skeleton', $this->data);
        return;
    }


}
