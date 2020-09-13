<?php

class Admin_tambah_berita extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Portal PAM Jaya';

        $this->load->view('admin/admin_template/head',$data);
        $this->load->view('admin/admin_template/navbar',$data);
        $this->load->view('admin/admin_template/sidebar');
        $this->load->view('admin/admin_berita/tambah_berita');
        $this->load->view('admin/admin_template/footer');
    }
}