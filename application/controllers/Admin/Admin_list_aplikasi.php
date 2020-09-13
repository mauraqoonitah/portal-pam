<?php

class Admin_list_Aplikasi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Portal PAM Jaya';
        
        $this->load->view('admin/admin_template/head');
        $this->load->view('admin/admin_template/navbar');
        $this->load->view('admin/admin_template/sidebar');
        $this->load->view('admin/admin_aplikasi/list_aplikasi');
        $this->load->view('admin/admin_template/footer');
    }
}