<?php

class Login extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Admin Portal PAM Jaya';

         $this->load->view('admin/admin_template/head',$data);
        // $this->load->view('admin/admin_template/navbar',$data);
        // $this->load->view('admin/admin_template/sidebar');
        $this->load->view('login/login');
        //$this->load->view('admin/admin_template/footer');
    }
}