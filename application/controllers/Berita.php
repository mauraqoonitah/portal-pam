<?php

class Berita extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function index()
    {
        $data['title'] = 'Berita Internal | PAM Jaya';
        $this->load->view('templates/header', $data);
        $this->load->view('berita/index');
        $this->load->view('templates/footer');
    }
}
