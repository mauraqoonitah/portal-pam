<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }

    public function index()
    {
        $data['item'] = $this->Item_model->getAllItem();
        $this->load->helper('url');
        $data['title'] = 'Portal Aplikasi PAM Jaya';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
