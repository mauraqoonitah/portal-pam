<?php

class Admin_list_berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Daftar Berita Portal | Admin Portal PAM Jaya';

        $this->load->view('admin/admin_template/head', $data);
        $this->load->view('admin/admin_template/navbar', $data);
        $this->load->view('admin/admin_template/sidebar', $data);
        $this->load->view('admin/admin_berita/list_berita');
        $this->load->view('admin/admin_template/footer');
    }
}
