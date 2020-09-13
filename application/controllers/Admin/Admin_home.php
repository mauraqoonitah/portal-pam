<?php

class Admin_home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Portal PAM Jaya';
        
        $this->load->view('admin/admin_template/head');
        $this->load->view('admin/admin_template/navbar');
        $this->load->view('admin/admin_template/sidebar');
        $this->load->view('admin/admin_home/dashboard');
        $this->load->view('admin/admin_template/footer');
    }
}