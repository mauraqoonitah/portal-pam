<?php

class Admin_tambah_aplikasi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Portal PAM Jaya';

        $this->load->view('admin/admin_template/head',$data);
        $this->load->view('admin/admin_template/navbar',$data);
        $this->load->view('admin/admin_template/sidebar');
        $this->load->view('admin/admin_aplikasi/tambah_aplikasi');
        $this->load->view('admin/admin_template/footer');
    }
}