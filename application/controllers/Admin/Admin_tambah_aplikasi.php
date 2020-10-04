<?php

class Admin_tambah_aplikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function index()
    {
        $this->load->helper('url');

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['item'] = $this->Item_model->getAllItem();



        $data['title'] = 'Admin Portal PAM Jaya';

        $this->form_validation->set_rules('name', 'Nama Aplikasi', 'required');
        $this->form_validation->set_rules('link', 'Link Aplikasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Aplikasi', 'required');
        $this->form_validation->set_rules('icon', 'Logo Aplikasi', 'required');




        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_template/head', $data);
            $this->load->view('admin/admin_template/navbar', $data);
            $this->load->view('admin/admin_template/sidebar', $data);
            $this->load->view('admin/admin_aplikasi/tambah_aplikasi', $data);
            $this->load->view('admin/admin_template/footer');
        } else {
            $this->Item_model->tambahAplikasi();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('admin/Admin_tambah_aplikasi');
        }
    }
}
